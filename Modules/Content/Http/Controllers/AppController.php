<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Game\Entities\Game;
use Modules\Content\Http\Requests\PostRequest;
use Modules\Content\Http\Requests\WallpaperRequest;
use Modules\Content\Http\Requests\VideoRequest;
use Modules\Content\Entities\Post;
use Illuminate\Support\Str;
use Session;
use File;
use Validator;
use Illuminate\Validation\Rule;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $wallcategory=[];
        $appscategory=[];
        $category=Category::GetApplicationGameCategory();
        $getTopChartgame=Post::GetApplicationGameTopChart();

        $appcategpry = Category::GetApplicationAppsCategory();
        $getTopChartapp=Post::GetApplicationAppTopChart();

        if(count($getTopChartgame) > 0){

            $cat['id']=0;
            $cat['name']='Top Chart';
            $wallcategory[]=$cat;
        }
        if(count($category) >0){
            foreach($category as $key=>$cat){
                $wallcategory[]= $cat;
            }
        }

        if(count($getTopChartapp) > 0){

            $cat['id']=0;
            $cat['name']='Top App';
            $appscategory[]=$cat;
        }
        if(count($appcategpry) >0){
            foreach($appcategpry as $key=>$cat){
                $appscategory[]= $cat;
            }
        }




        if(!empty($wallcategory))
        $firstKey = array_values($wallcategory)[0];


        if(!empty($appscategory))
        $firstKeyApp = array_values($appscategory)[0];

        if(isset($firstKey['id']) && $firstKey['id']!=0){

            $application = Category::find($firstKey['id'])->post()->wherePost_type('application')->whereApplication_type('game')->get();

        }elseif(isset($firstKey['id']) && $firstKey['id']==0){

            $application=Post::GetApplicationGameTopChart();

        }else{

            $application=[];
        }


        if(isset($firstKeyApp['id']) && $firstKeyApp['id']!=0){

            $app = Category::find($firstKeyApp['id'])->post()->wherePost_type('application')->whereApplication_type('software')->get();

        }elseif(isset($firstKeyApp['id']) && $firstKeyApp['id']==0){

            $app=Post::GetApplicationAppTopChart();

        }else{

            $app=[];
        }



        return view('content::game',compact('wallcategory','application','appscategory','app'));
    }

    public function game_details(Request $request,$uuid=null)
    {
        $details = Post::GetDetailById($uuid,$type='application',$application='game')->first();
        $otherApplication = Post::GetSimilarGame($uuid);

        // dd($details->banner);
        
        if (isset($details->media->media)) {
            $details->medias = unserialize($details->media->media);
        }else{
            $details->medias = array();
        }

        return view('content::game_details',compact('details','otherApplication'));
    }


    public function app_details(Request $request,$uuid=null)
    {
        $details = Post::GetDetailById($uuid,$type='application',$application='software')->first(); 
        $otherApplication = Post::GetSimilarApp($uuid);

        if (isset($details->media->media)) {
            $details->medias = unserialize($details->media->media);
        }else{
            $details->medias = [];
        }

        return view('content::app_details',compact('details','otherApplication'));
    }

    public function more_game()
    {

        $wallcategory=[];
        $category=Category::GetApplicationGameCategory();
        $getTopChartWallpaper=Post::GetApplicationGameTopChart();

        if(count($getTopChartWallpaper) > 0){

            $cat['id']=0;
            $cat['name']='Top Chart';
            $wallcategory[]=$cat;
        }
        if(count($category) >0){
            foreach($category as $key=>$cat){
                $wallcategory[]= $cat;
            }
        }
        if(!empty($wallcategory))
        $firstKey = array_values($wallcategory)[0];

        if(isset($firstKey['id']) && $firstKey['id']!=0){

            $application = Category::find($firstKey['id'])->post()->wherePost_type('application')->whereApplication_type('game')->get();

        }elseif(isset($firstKey['id']) && $firstKey['id']==0){

            $application=Post::GetApplicationGameTopChart();

        }else{

            $application=[];
        }

        return view('content::more_game',compact('wallcategory','application'));
    }


    public function more_app()
    {
        $appscategory=[];
        $appcategpry = Category::GetApplicationAppsCategory();
        $getTopChartapp=Post::GetApplicationAppTopChart();

        if(count($getTopChartapp) > 0){

            $cat['id']=0;
            $cat['name']='Top App';
            $appscategory[]=$cat;
        }
        if(count($appcategpry) >0){
            foreach($appcategpry as $key=>$cat){
                $appscategory[]= $cat;
            }
        }


        if(!empty($appscategory))
        $firstKeyApp = array_values($appscategory)[0];

        if(isset($firstKeyApp['id']) && $firstKeyApp['id']!=0){

            $apps = Category::find($firstKeyApp['id'])->post()->wherePost_type('application')->whereApplication_type('software')->get();

        }elseif(isset($firstKeyApp['id']) && $firstKeyApp['id']==0){

            $apps=Post::GetApplicationAppTopChart();

        }else{

            $apps=[];
        }



        return view('content::more_app',compact('appscategory','apps'));
    }

    public function download( $type='', $uuid='')
    {

        $getAPPdetails = Post::GetAppByUUID($uuid);

        if($type == 'wallpaper'){
            $myFile = public_path("uploads/wallpaper/".$uuid.'/image/'.$getAPPdetails->image);
        }
        
        if($type == 'video'){
            $myFile = public_path("video/".$uuid."/file/".$getAPPdetails->file);
        }

        if($type == 'app'){
            $myFile = public_path("uploads/application/".$uuid."/file/".$getAPPdetails->file);
        }
        // dd($myFile);
        if(File::exists($myFile)) {
            return response()->download($myFile);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('content::create');
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
        return view('content::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('content::edit');
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
}
