<?php

namespace Modules\Competition\Http\Controllers;

use File;
use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use App\Components\Core\Utilities\Helpers;

use Modules\Competition\Http\Requests\Edit;
use Modules\Competition\Http\Requests\CompetitionRequest;

use Modules\Domain\Entities\Domain;
use Modules\Game\Entities\GameModel;
use Modules\Category\Entities\Category;
use Modules\Competition\Entities\Prize;
use Modules\Competition\Entities\Competition;

class CompetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['index']);
    }

    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $html = "";
            $finish_competitions = Competition::getAllByDuration('finish');

            foreach ($finish_competitions as $finish_comp){

                $html .="<div class='competition-winner-box shadow-sm'>";
                $html .="<div class='competition-info bg-light pb-3'>";
                $html .="<div class='row no-gutters'>";
                $html .="<div class='col-7'>";
                $html .="<div class='pr-2'>";
                $src = asset("/uploads/games/".$finish_comp->game_id."/".$finish_comp->game_image);
                $html .="<img class='img-fluid' src='".$src."' alt='Pictures'>";
                $html .="</div></div>";
                $html .="<div class='col-5'>";
                $html .="<p class='mb-1 font-weight-bold text-truncate'>".$finish_comp->game_name."</p>";
                $html .="<div class='competition-info-desc d-block small mb-1'>".$finish_comp->category_name->category_name."</div>";
                $html .="<div class='d-block small mb-1'>Date: ".$finish_comp->start_date."</div>";
                $html .="<div class='position-relative'>";
                if ($finish_comp->competition_type == 1) {
                    $type = 'Daily';
                }
                if ($finish_comp->competition_type == 2) {
                    $type = 'Weekly';
                }
                if ($finish_comp->competition_type == 3) {
                    $type = 'Monthly';
                }
                $html .="<a href='#' class='badge badge-pill badge-secondary mr-1'>".$type."</a></div>";
                $html .="</div></div></div>";
                $html .="<div class='bg-light text-center divider-bg'><a href='javacript:void(0);' class='btn text-uppercase rounded-pill px-4 disable_btn'>Finished</a></div>";
                $html .="<div class='bg-grey py-3' style='padding: 10px; border-radius: 0 0 10px 10px;'><div class='row no-gutters'><div class='col-4'><div class='competition-reward shadow'>";
                $w1 = asset('frontend_theme/images/winner_01.png');
                $w2 = asset('frontend_theme/images/winner_02.png');
                $w3 = asset('frontend_theme/images/winner_03.png');
                $p1 = asset('/uploads/competetion/'.$finish_comp->id.'/prize1/'.$finish_comp->prize_image1);
                $p2 = asset('/uploads/competetion/'.$finish_comp->id.'/prize2/'.$finish_comp->prize_image2);
                $p3 = asset('/uploads/competetion/'.$finish_comp->id.'/prize3/'.$finish_comp->prize_image3);
                $html .="<div class='competition-reward-pic p-1'><img src='".$p1."' class='img-fluid'></div>";
                $html .="<div class='row no-gutters position-relative p-1'><div class='col-3'>";
                $html .="<div class='badge-reward'><img class='img-fluid' src='".$w1."' alt='Gold'></div></div>";
                $html .="<div class='col-9'><div class='ml-2'><small class='text-muted text-uppercase' style='font-size: 10px; line-height: normal;'>#1 Winner</small></div></div></div></div></div>";
                $html .="<div class='col-4'><div class='competition-reward shadow'><div class='competition-reward-pic p-1'><img src='".$p2."' class='img-fluid'></div>";
                $html .="<div class='row no-gutters position-relative p-1'><div class='col-3'><div class='badge-reward'><img class='img-fluid' src='".$w2."' alt='Silver'></div></div>";
                $html .="<div class='col-9'><div class='ml-2'><small class='text-muted text-uppercase' style='font-size: 10px; line-height: normal;'>#2 Winner</small></div></div></div></div></div>";
                $html .="<div class='col-4'><div class='competition-reward shadow'><div class='competition-reward-pic p-1'><img src='".$p3."' class='img-fluid'></div>";
                $html .="<div class='row no-gutters position-relative p-1'><div class='col-3'><div class='badge-reward'><img class='img-fluid' src='".$w3."' alt='Bronze'></div></div>";
                $html .="<div class='col-9'><div class='ml-2'><small class='text-muted text-uppercase' style='font-size: 10px; line-height: normal;'>#3 Winner</small></div></div></div></div></div></div></div></div>";

            }

            $arr['html'] = $html;
            $arr['hasPages'] = $finish_competitions->hasMorePages();

            // dd($arr);

            return $arr;
        }

        $soon_competitions = Competition::getAllByDuration('soon');
        $finish_competitions = Competition::getAllByDuration('finish');
        $current_competitions = Competition::getAllByDuration('current');

        // dd(config('app.locale'));
        // dd(Session::get('locale_lang'));
        return view('competition::index', compact('soon_competitions', 'finish_competitions', 'current_competitions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $game_list = array();

        $games = DB::table('games')->select('id', 'name')->get();

        foreach ($games as $key) {
            $game_list[$key->id]= $key->name;
        }

       return view('competition::create', compact('game_list'));
    }

    public function show()
    {
        return view('competition::show');
    }

    public function ajax_competition_list(Request $request)
    {
        $competition_data=Competition::get();
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $search_arr = $request->get('search');
        // $order_arr = $request->get('order');
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');


        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = 'DESC'; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Competition::select('count(*) as allcount')->count();

        $totalRecordswithFilter = Competition::select('count(*) as allcount')->join('games', 'competitions.id', '=', 'games.id')->where('name', 'like', '%' .$searchValue . '%')->where('competitions.is_deleted', null)->count();
          // Enable query log

        $records = Competition::orderBy($columnName,$columnSortOrder)
           ->join('games', 'competitions.id_competitiongame', '=', 'games.id')
           ->where('games.name', 'like', '%' .$searchValue . '%')
           ->where('competitions.is_deleted', null)
           ->select('competitions.*','games.name')
           ->skip($start)
           ->take($rowperpage)
           ->get();
           // Your Eloquent query executed by using get()

        // Show results of log
        //$path = public_path().'/uplodes/games/'.$records['uuid'];
        // dd(public_path());
        if(count($records)>0){
            $count = 1;
            foreach($records as $record){
                $id = $record['id'];
                $name = $record['name'];
                if($record['competition_type'] == 1){
                 $competition_type = 'daily';
                }else if($record['competition_type'] == 2){
                 $competition_type = 'weekly';
                }else if($record['competition_type'] == 3){
                 $competition_type = 'monthly';
                }else{
                 $competition_type ="new competition_type";
                }
                // $img = asset().'/uplodes/games/'.$record['id'].'/'.$record['image'];
                $start_date = $record['start_date'];
                $end_date = $record['end_date'];
                $created_at = $record['created_at'];
                $updated_at = $record['updated_at'];


                $data_arr[] = array(
                  "Id" => $id,
                  "Game Name" => ucfirst($name),
                  "Competition Type" => ucfirst($competition_type),
                  "Start Date" => $start_date,
                  "End Date" => $end_date,
                  "Created at" => date('Y-m-d', strtotime($created_at)),
                  "Updated at" => date('Y-m-d', strtotime($updated_at)),
                  "Action" => '<a href="'.url('/admin/competition').'/'.$id.'/edit_competition_view" class="btn btn-info btn-sm "><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-danger btn-sm comp_del" data-comp_id="'.$id.'"><i class="fas fa-trash-alt"></i></a>'
                );
            }
        }else{
            $data_arr = array();
        }

        // dd($data_arr);
        $output = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordswithFilter,
            "data" => $data_arr,
        );

        //output to json format
        echo json_encode($output);
    }

    public function edit_competition_view($c_id)
    {
        $category =[];

        $data['competition_details']= Competition::where('competitions.id', $c_id)
            ->leftJoin('games', 'competitions.id_competitiongame', '=', 'games.id')
            ->select('competitions.*','games.name')
        ->first();

       $data['games']= GameModel::select('id', 'name')->whereIs_deleted(null)->get();

        return view('competition::edit', compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CompetitionRequest $request)
    {
        $competition = array();
        //Form validation using Request class
        $validated = $request->validated();

        // date  set
        if((isset($request->competition_type))&&($request->competition_type != 1)){
            $start_date = $request->schedule_datepicker_start_date;
            $end_date = $request->schedule_datepicker_end_date;
        }else{
            $start_date = $request->schedule_datepicker_start_date;
            $end_date = $request->schedule_datepicker_start_date;
        }

        //Set image name
        $banner_image = $request->file('image')->getClientOriginalName();
        $imageName1 = $request->file('first_prizeicon_image')->getClientOriginalName();
        $imageName3 = $request->file('third_prizeicon_image')->getClientOriginalName();
        $imageName2 = $request->file('second_prizeicon_image')->getClientOriginalName();

        //set the competition information in database
        $competition = Competition::create([
            'id_competitiongame' => $request->compgame_name,
            'competition_type' => $request->competition_type,
            'prize_image1'=>$imageName1,
            'prize_coins1'=>$request->first_prizecoin,
            'prize_image2'=>$imageName2,
            'prize_coins2'=>$request->second_prizecoin,
            'prize_image3'=>$imageName3,
            'prize_coins3'=>$request->third_prizecoin,
            'start_date' => date('Y-m-d', strtotime($start_date)),
            'end_date' => date('Y-m-d', strtotime($end_date)),
            'banner_image' =>$banner_image,
        ]);
        // Your Eloquent query executed by using get()

        // Show results of log
        $id= Competition::latest()->first()->id; // last id of competition created

        $path1 = public_path().'/uploads/competetion/'.$id.'/prize1/';
        $path2 = public_path().'/uploads/competetion/'.$id.'/prize2/';
        $path3 = public_path().'/uploads/competetion/'.$id.'/prize3/';
        $banner_path = public_path().'/uploads/competetion/'.$id.'/banner/'; // path to store file

        // check folder exist or not
        if ( ! File::exists($path1) ) {
            File::makeDirectory($path1, 0777, true, true);
        }
        if ( ! File::exists($path2) ) {
            File::makeDirectory($path2, 0777, true, true);
        }
        if ( ! File::exists($path3) ) {
            File::makeDirectory($path3, 0777, true, true);
        }
        if ( ! File::exists($banner_path) ) {
            File::makeDirectory($banner_path, 0777, true, true);
        }

        $request->file('image')->move($banner_path, $banner_image);
        $request->file('first_prizeicon_image')->move($path1, $imageName1);
        $request->file('second_prizeicon_image')->move($path2, $imageName2);
        $request->file('third_prizeicon_image')->move($path3, $imageName3);

        return redirect('/admin/competition/show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $game_array = array();
        $get_competition_schedule = array();
        $games = DB::table('games')->select('id', 'name')->get();
        foreach ($games as $key) {
            # code...
            $game_array[$key->id]= $key->name;
        }
       $get_competition_schedule = Competition::where('competitions.id',$id)
        ->Join('games','competitions.id_competitiongame','=','games.id')
        ->select('competitions.*','games.name')->get();

        return view('competition::edit')->with('schedule_data', $get_competition_schedule);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Edit $request, $id)
    {
        $validated = $request->validated();

        $imageName1 = '';
        $imageName2 = '';
        $imageName3 = '';
        $competition = array();
        $competition_banner = '';

        // date range or normal date set
        if((isset($request->competition_type))&&($request->competition_type != 1)){
            $start_date = $request->schedule_datepicker_start_date;
            $end_date = $request->schedule_datepicker_end_date;
        }else{
            $start_date = $request->schedule_datepicker_start_date;
            $end_date = $request->schedule_datepicker_start_date;
        }

        if($request->hasFile('image')){

            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',]);

            $banner_path = public_path().'/uploads/competetion/'.$id.'/banner/';

            if (! File::exists($banner_path) ) {
                File::makeDirectory($banner_path, 0777, true, true);
            }

            $competition_banner = $request->file('image')->getClientOriginalName();

            $image_path = $banner_path.$request->competition_banner_old;

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $request->file('image')->move($banner_path, $competition_banner);
        }

        if($request->hasFile('first_prizeicon_image')){

            $request->validate(['first_prizeicon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',]);

            $path1 = public_path().'/uploads/competetion/'.$id.'/prize1/';

            if (! File::exists($path1) ) {
                File::makeDirectory($path1, 0777, true, true);
            }

            $imageName1 = $request->file('first_prizeicon_image')->getClientOriginalName();
            if(File::exists($path1.$request->first_prizeicon_image_old)) {
                File::delete($path1.$request->first_prizeicon_image_old);
            }
            $request->file('first_prizeicon_image')->move($path1, $imageName1);
        }

        if($request->hasFile('second_prizeicon_image')){

            $request->validate(['second_prizeicon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',]);

            $path2 = public_path().'/uploads/competetion/'.$id.'/prize2/';

            if (! File::exists($path2) ) {
                File::makeDirectory($path2, 0777, true, true);
            }

            $imageName2 = $request->file('second_prizeicon_image')->getClientOriginalName();
            if(File::exists($path2.$request->second_prizeicon_image_old)) {
                File::delete($path2.$request->second_prizeicon_image_old);
            }
            $request->file('second_prizeicon_image')->move($path2, $imageName2);
        }

        if($request->hasFile('third_prizeicon_image')){
            $request->validate(['third_prizeicon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',]);

            $path3 = public_path().'/uploads/competetion/'.$id.'/prize3/';

            if (! File::exists($path3) ) {
                File::makeDirectory($path3, 0777, true, true);
            }

            $imageName3 = $request->file('third_prizeicon_image')->getClientOriginalName();
            if(File::exists($path3.$request->third_prizeicon_image_old)) {
                File::delete($path3.$request->third_prizeicon_image_old);
            }
            $request->file('third_prizeicon_image')->move($path3, $imageName3);
        }

        $status = Competition::competitionDetailsById($id)->first();

        $status->prize_coins1 = $request->first_prizecoin;
        $status->prize_coins3 = $request->third_prizecoin;
        $status->prize_coins2 = $request->second_prizecoin;
        $status->id_competitiongame = $request->compgame_name;
        $status->competition_type = $request->competition_type;
        $status->start_date = date('Y-m-d', strtotime($end_date));
        $status->end_date = date('Y-m-d', strtotime($end_date));

        if ($imageName1) {
            $status->prize_image1 = $imageName1;
        }
        if ($imageName2) {
            $status->prize_image2 = $imageName2;
        }
        if ($imageName3) {
            $status->prize_image3 = $imageName3;
        }
        if ($competition_banner) {
            $status->banner_image = $competition_banner;
        }

        if($status->save()){
            return redirect('/admin/competition/show');
        }else{
            return redirect('/admin/competition/addcometition')->withInput()->with('flash_message_error', 'Something went wrong, try again later');
        }
    }

    public function destroy(Request $request)
    {
        $comp_id = $request->comp_id;
        $comp_detl = Competition::competitionDetailsById($comp_id)->first();

        $comp_detl->is_deleted = '1';

        if ($comp_detl->save()) {
            $res['status'] = true;
            $res['msg'] = 'Competition deleted successfully';
        } else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        echo json_encode($res);
        exit();
    }
}
