<?php

namespace Modules\Page\Http\Controllers;

use Session;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

use Modules\Game\Entities\Game;
use Modules\Content\Entities\Post;
use Modules\Banner\Entities\Banner;
use Modules\Category\Entities\Category;
use Modules\Competition\Entities\Competition;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
    */
    public function index(Request $request)
    {
        /*$paginate = 5;
        if ($request->ajax()){
            $html = '';
            $page = $request->get('page');
            $id = $request->get('type');

            if ($id != 'top_chart') {

                $data = Game::getPaginateByCategory($id, $paginate);
                foreach ($data as $key => $value) {
                    $cat_dtl = Category::getOneCategoryById($value->category_id)->first();

                    $src = asset('/uploads/games/'.$value->id.'/cover_image/'.$value->cover_image);
                    $html .="<div class='col-6'><div class='game-list'><a href='".url('/game/'.$value->uuid)."'><img src='".$src."' alt='Game'></a><div class='row no-gutters mt-2'><div class='col-8'><h6 class='mb-0 text-truncate'>".$value->name."</h6><small class='text-secondary'>".$cat_dtl->name."</small></div><div class='col-4 text-right'><a href='".url('/game/'.$value->uuid)."' class='btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase'>Play</a></div></div></div></div>";
                }
                // dd($data->hasMorePages());
                $arr['html'] = $html;
                $arr['hasPages'] = $data->hasMorePages();


            } else {

                $data = Game::getTopChartPaginateGames($paginate);
                foreach ($data as $key => $value) {
                    $cat_dtl = Category::getOneCategoryById($value->category_id)->first();

                    $src = asset('/uploads/games/'.$value->id.'/cover_image/'.$value->cover_image);
                    $html .="<div class='col-6'><div class='game-list'><a href='".url('/game/'.$value->uuid)."'><img src='".$src."' alt='Game'></a><div class='row no-gutters mt-2'><div class='col-8'><h6 class='mb-0 text-truncate'>".$value->name."</h6><small class='text-secondary'>".$cat_dtl->name."</small></div><div class='col-4 text-right'><a href='".url('/game/'.$value->uuid)."' class='btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase'>Play</a></div></div></div></div>";
                }
                $arr['html'] = $html;
                $arr['hasPages'] = $data->hasMorePages();
            }


            // dd($arr);
            return $arr;

        }else{

            $locale='';
            if ($request->path() == 'thi') {
                $locale='thi';
            }
            if ($request->path() == 'en') {
                $locale='en';
            }

            if ($locale) {
                App::setLocale($locale);
            }
            // dd($request->path());

        }*/

        $paginate = 6;
        $top_chart_games = Game::getTopChartPaginateGames($paginate);
        $categories = Category::getActiveCategories();
        $getTopChartCometition = Competition::competitionType('0')->get();

        return view('page::index',compact('getTopChartCometition', 'categories', 'top_chart_games'));
    }

    public function cat_game(Request $request)
    {
        $games = [];
        $paginate = 5;
        $type = $request->type;

        if ($type != 'top_chart') {

            $data = Game::where('is_home', '1')->getPaginateByCategory($type, $paginate);
            $t_name = Category::getOneCategoryById($type)->first();

            foreach ($data as $key => $value) {

                $value->category_name = $t_name->name;
                $games[] = (object)$value;
            }

            $arr['type'] = $type;
            $arr['games'] = $games;
            $arr['type_name'] = $t_name->name;

        } else {

            $type_name = 'Top Chart';
            $data = Game::getTopChartPaginateGames($paginate);

            foreach ($data as $key => $value) {

                $cat_dtl = Category::getOneCategoryById($value->category_id)->first();
                $value->category_name = $cat_dtl->name;

                $games[] = (object)$value;
            }

            $arr['type'] = $type;
            $arr['games'] = $games;
            $arr['type_name'] = $type_name;

        }

        echo json_encode($arr);
        exit();
    }

    /*public function search(Request $request)
    {
        $apps = [];
        $games = [];
        $key_word = $request->post('key_word');

        if ($key_word != null) {
            $apps = Post::GetAppByKeyWord($key_word)->get();
            $games = Game::GetGameByKeyWord($key_word)->get();
        }

        return Response()->json([
            "success" => true,
            "apps" => $apps,
            "games" => $games
        ]);
    }*/

    function customShift($array, $id){
        foreach($array as $key => $val){     // loop all elements
            if($val['id'] == $id){             // check for id $id
                unset($array[$key]);         // unset the $array with id $id
                array_unshift($array, $val); // unshift the array with $val to push in the beginning of array
                return $array;               // return new $array
            }
        }
    }

    public function get_cat_details(Request $request)
    {

        $category_id = $request->post('cat_id');
        $games = Category::find($category_id)->games()->get();
        return Response()->json([
            "success" => true,
            "games" => $games
        ]);
    }


    public function html_game()
    {
        $NewCategoryArray =[];
        $games =array();
        $categories=Category::whereType('game')->whereStatus(1)->get();

        if(count($categories)>0){

            foreach($categories as $categorie){

                $NewCategory['id'] = $categorie['id'];
                $NewCategory['name'] = $categorie['name'];

                $NewCategoryArray[] = $NewCategory;
            }

            $FirstCategory=Category::whereName('Top Chart')->first();

            if($FirstCategory){

                $FirstCategoryId = $FirstCategory['id'];
                $NewCategoryArray = $this->customShift($NewCategoryArray, $FirstCategoryId);
            }

            $firstKey = array_values($NewCategoryArray)[0];
            $firstId = isset($firstKey['id']) ? $firstKey['id'] : '';
            $games = Category::find($firstId)->games()->get();




        }

        return view('page::htmlGamelist',compact('NewCategoryArray','games'));
    }

    public function html_game_details(Request $request,$game_uuid=null)
    {
        $details = Game::whereUuid($game_uuid)->first();
        $otherGame = Game::inRandomOrder()->limit(3)->get();

        return view('page::htmlGameDetails',compact('details','otherGame'));
    }

    public function subscribe(){

        $request = array();
        $subscribe_status=404;
        $request['channel'] = 'portal';
        $request['renewalDays'] = 1;
        $request['freemiumDays'] = 3;
        $request['firstMessage'] = 'You have subscribe Slypee Store and get free access for 3 days, after RS 4 + tax/day Visit jazz.slypee.pk to unsub,send unsub to 9825.';

        $request['renewalMessage'] = 'test';
        $request['unsubscribeMessage'] = 'You have unsubscribed Slypee Store. To subscribe again, go to jazz.slypee.pk';
        $request['CampaignID'] = 0;
        $request['affSub'] = '';
        $request['adNet'] = '';
        $request['op'] = '';
        $msisdn='919748834550';
        $data = json_encode($request);

        $query_url = "http://mobilink.pk.linkit360.ru/api/v1/subscriptions";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $query_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST,           1 );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'msisdn:'.$msisdn,
            //'Content-Length: ' . strlen($data)
        ));

        $result = curl_exec($ch);
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);
            $subscribe_status = $info['http_code'];
        }

         $json_info =json_encode($info);

        if($subscribe_status==200){

        }else{

            echo json_encode(array('success'=>0,'error'=>1,'msg'=>'Enter valid MSISDN',"res"=> $info));

        }

    }


    public function applist()
    {
        return view('page::applist');
    }

    public function help_center()
    {
       return view('page::help-center');
    }

    public function rule_policy()
    {
       return view('page::rule-policy');
    }

    public function how_to_play()
    {
       return view('page::how-to-play');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('page::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('page::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('page::edit');
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
    public function changlang(Request $request)
    {
        session(['locale_lang' => app('request')->val]);
        echo json_encode(true);

        /*if (array_key_exists(app('request')->val, Config::get('languages'))) {
            Session::put('applocale', app('request')->val);

            return Redirect::back();
        }*/


    }

}
