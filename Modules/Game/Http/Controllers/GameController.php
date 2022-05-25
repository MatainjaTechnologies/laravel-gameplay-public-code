<?php

namespace Modules\Game\Http\Controllers;

use File;
use Session;
use Cookie;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use App\Components\Core\Utilities\Helpers;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Modules\Game\Http\Requests\GameRequest;
use Modules\Game\Http\Requests\GameRequestImagewo;

use ZanySoft\Zip\Zip;
use App\Event\GameViewCreated;

use Modules\Game\Entities\Game;
use Modules\Domain\Entities\Domain;
use Modules\Winner\Entities\Winner;
use Modules\Category\Entities\Category;
use Modules\Competition\Entities\Competition;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except(['search', 'game_details','comp_game_details']);
    }

    public function index()
    {
        return view('game::index');
    }

    public function search(Request $request)
    {
        $query = Game::query();
        $games = app(Pipeline::class)
        ->send($query)
        ->through([
            \Modules\Game\QueryFilter\Active::class,
            \Modules\Game\QueryFilter\Search::class,
            \Modules\Game\QueryFilter\TopGame::class,
            ])
            ->thenReturn()
        ->get();

        return view('game::search', compact('games'));
    }

    public function game_details($uuid)
    {
        $game_details = Game::getDataUuid($uuid)->first();

        if(empty($game_details))
        {
             abort(404);
        }
        if ($game_details) {
            $game_details->image = unserialize($game_details->image);
        }

        event( new GameViewCreated($game_details->view,$game_details->id));

        $other_games = Game::getOtherGames($game_details->category_id, $uuid)->orderBy('view', 'DESC')->get();
        // dd($other_games);
        return view('game::game-details', compact('game_details', 'other_games'));
    }

    public function comp_game_details($comp_id, $uuid)
    {
        $winners = Winner::CompWinners($comp_id)->limit(3)->orderBy('id', 'DESC')->get();
        $game_details = Game::getDataUuid($uuid)->first();
        $comp_details = Competition::competitionDetailsById($comp_id)->first();

        if ($game_details) {
            $game_details->image = unserialize($game_details->image);
        }

        event( new GameViewCreated($game_details->view,$game_details->id));

        $other_games = Game::getOtherGames($game_details->category_id, $uuid)->orderBy('view', 'DESC')->get();

        return view('game::game-details', compact('game_details', 'comp_details', 'winners', 'other_games'));
    }

    public function create(Request $request)
    {
        $category =[];
        $category=Category::select("id","name")
                         ->GameActive('game')
                         ->get();

        return view('game::create',compact('category'));
    }

    public function store(GameRequest $request)
    {
        $serilize_img_arr = '';
        $validated = $request->validated();

        $uuid = Str::uuid();
        $game = Game::create([
            'uuid' =>$uuid,
            'image' => '0',
            'version' => '1',
            'name' => $request->name,
            'rule' => $request->rule,
            'coin' => $request->coin,
            'is_home' => $request->home,
            'category_id' => $request->category,
            'description' => $request->description,
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
            'url' => ($request->url !='') ? $request->url : 'NULL',
            'is_top_game' => ($request->top_chart != null) ? '1' : '0',
        ]);

        $last_id = $game['id'];

        // Game File Upload
        if($request->file('game_file')){


            //Create dynamic game file folder
             $game_files_path = public_path().'/games/'.$uuid;
            // /web/public/games/
           // die('kk');

            if(!File::exists($game_files_path)) {
                File::makeDirectory($game_files_path, 0777, true, true);
            }

            // please install this -> composer require zanysoft/laravel-zip
            $zip = Zip::open($request->file('game_file'));


            $zip->extract($game_files_path);
        }

        // Game Image Upload
        if($request->hasFile('image')){

            $image = $request->file('image');

            $destinationPath =public_path().'/uploads/games/'.$last_id;

            if ( ! File::exists($destinationPath) ) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            foreach ($image as $key => $file) {
                // upload path
                $extention = $file->extension(); //$request->file('image')
                $name = $last_id.'_'.date('dmYHis').'_game_'.$key.'.'.$extention;

                $file->move($destinationPath, $name);

                $img_arr[] = $name;
            }

            $serilize_img_arr = serialize($img_arr);

        }

        if($request->hasFile('cover_image')){

            //Icon image upload
            $cover_image = $request->file('cover_image');
            $cover_image_extention = $request->file('cover_image')->extension();
            $img_name = $last_id.'_'.date('dmYHis').'_cover_image.'.$cover_image_extention;

            //cover_image image save destination
            $cvr_img_destination = public_path().'/uploads/games/'.$last_id.'/cover_image/';

            if ( ! File::exists($cvr_img_destination)) {
                File::makeDirectory($cvr_img_destination, 0777, true, true);
            }

            if ($cover_image->move($cvr_img_destination, $img_name)) {
                $cover_image_name = $img_name;
            }

        }

        $game_dtl = Game::getDetailsById($last_id);

        $game_dtl->image = $serilize_img_arr;
        $game_dtl->cover_image = $cover_image_name;

        if ($game_dtl->save()) {
            return redirect('/game/admin/list')->with('flash_message_success', 'Game saved successfully');
        }else{
            return redirect('/game/admin/create')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later');
        }

    }

    public function edit_game_view($game_uuid)
    {
        $category =[];
        $category=Category::select("id","name")
            ->GameActive('game')
        ->get();

        $game_details = Game::select('*')->ActiveDetails($game_uuid)->first();

        $game_details->all_category = $category;
        $game_details->image = unserialize($game_details->image);

        return view('game::edit', compact('game_details'));
    }

    public function edit_game(GameRequestImagewo $request)
    {
        $serilize_img_arr = '';
        $cover_image_name = '';
        $validated = $request->validated();

        $game_detl = Game::select('*')->ActiveDetails($request->game_uuid)->first();

        // Game Image Upload
        if($request->hasFile('image')){

            $image = $request->file('image');

            $destinationPath =public_path().'/uploads/games/'.$game_detl->id;

            if ( ! File::exists($destinationPath) ) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            foreach ($image as $key => $file) {
                // upload path
                $extention = $file->extension(); //$request->file('image')
                $name = $game_detl->id.'_'.date('dmYHis').'_game_'.$key.'.'.$extention;

                $file->move($destinationPath, $name);

                $img_arr[] = $name;
            }

            $old_imgs = unserialize($game_detl->image);

            $new_imgs = array_merge($old_imgs, $img_arr);

            $serilize_img_arr = serialize($new_imgs);

        }

        if($request->hasFile('cover_image')){

            //Icon image upload
            $cover_image = $request->file('cover_image');
            $cover_image_extention = $request->file('cover_image')->extension();
            $img_name = $game_detl->id.'_'.date('dmYHis').'_cover_image.'.$cover_image_extention;

            //cover_image image save destination
            $cvr_img_destination = public_path().'/uploads/games/'.$game_detl->id.'/cover_image/';

            if ( ! File::exists($cvr_img_destination)) {
                File::makeDirectory($cvr_img_destination, 0777, true, true);
            }

            if ($cover_image->move($cvr_img_destination, $img_name)) {
                $cover_image_name = $img_name;
            }

        }

        $uuid = $game_detl->uuid;
        $game_detl->name = $request->name;
        $game_detl->description = $request->description;
        $game_detl->rule = $request->rule;
        $game_detl->category_id = $request->category;
        $game_detl->coin = $request->coin;
        $game_detl->version = $request->version;
        $game_detl->is_home = $request->home;
        if($serilize_img_arr != ''){
            $game_detl->image = $serilize_img_arr;
        }
        if($cover_image_name != ''){
            $game_detl->cover_image = $cover_image_name;
        }
        $game_detl->url = ($request->url !='') ? $request->url : 'NULL';
        $game_detl->is_top_game = ($request->top_chart != null) ? '1' : '0';

        if($request->file('game_file')){

            //Create dynamic game file folder
            $game_files_path = public_path().'/games/'.$uuid;

            if(File::exists($game_files_path)) {
                File::deleteDirectory($game_files_path);
            }

            File::cleanDirectory($game_files_path);

            if(!File::exists($game_files_path)) {
                File::makeDirectory($game_files_path, 0777, true, true);
            }


            // please install this -> composer require zanysoft/laravel-zip
            $zip = Zip::open($request->file('game_file'));
            $zip->extract($game_files_path);
        }

        if ($game_detl->save()) {
            return redirect('/game/admin/list')->with('flash_message_success', 'Game saved successfully');
        } else {
            return redirect('/game/admin/edit/'.$uuid)->with('flash_message_error', 'Somthing went wrong, try again later');
        }




    }

    public function list()
    {
        return view('game::show');
    }

    public function ajax_game_list(Request $request)
    {
        $data_arr=[];
        $game=Game::get();
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $search_arr = $request->get('search');
        $order_arr = $request->get('order');
        // dd($order_arr);
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');


        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        // $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $columnSortOrder = 'desc';
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Game::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Game::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->where('games.is_deleted', null)->count();
        $records = Game::orderBy($columnName,$columnSortOrder)
           ->where('games.name', 'like', '%' .$searchValue . '%')
           ->where('games.is_deleted', null)
           ->select('games.*')
           ->skip($start)
           ->take($rowperpage)
        ->get();

        //$path = public_path().'/uplodes/games/'.$records['uuid'];
        // dd(public_path());
        if(count($records)>0){

            $count = 1;
            foreach($records as $record){

                $image = $record['cover_image'];

                $id = $record['id'];
                $name = $record['name'];
                $img = asset('/uploads/games/'.$record['id'].'/cover_image/'.$image);
                $description = $record['description'];
                $rule = $record['rule'];
                $uuid = $record['uuid'];

                $data_arr[] = array(
                  "id" => $id,
                  "name" => $name,
                  'image' => '<img src='.$img.' alt="Game Image" width="50" height="60">',
                  "description" => $description,
                  "rule" => $rule,
                  "view" => $record['view'],
                  'action' => '<a href="'.url('/game/admin/edit').'/'.$uuid.'" class="btn btn-info btn-sm "><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-danger btn-sm game_del" data-game_uuid="'.$uuid.'"><i class="fas fa-trash-alt"></i></a>'
                );
            }
        }


        $output = array(
                "draw" => intval($draw),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $totalRecordswithFilter,
                "data" => $data_arr,
        );

        //output to json format
        echo json_encode($output);
    }

    public function destroy(Request $request)
    {
        $uuid = $request->game_uuid;
        $game_detl = Game::select('*')->ActiveDetails($uuid)->first();

        $game_detl->is_deleted = '1';

        if ($game_detl->save()) {
            $res['status'] = true;
            $res['msg'] = 'Game deleted successfully';
        } else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        echo json_encode($res);
        exit();
    }

    /** * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('game::edit');
    }




    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }
}
