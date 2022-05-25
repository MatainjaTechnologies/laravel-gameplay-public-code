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

class WallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Wallcategory=[];
        $category=Category::GetWallpaperCategory();
        $getTopChartWallpaper=Post::GetPostTopChartWallpaper();
        // dd($getTopChartWallpaper);
        if(count($getTopChartWallpaper) > 0){

            $cat['id']=0;
            $cat['name']='Top Wallpaper';
            $Wallcategory[]=$cat;
        }
        if(count($category) >0){
            foreach($category as $key=>$cat){
                $Wallcategory[]= $cat;
            }
        }
        if(!empty($Wallcategory))
        $firstKey = array_values($Wallcategory)[0];

        if(isset($firstKey['id']) && $firstKey['id']!=0){

            $wallpaper = Category::find($firstKey['id'])->post()->wherePost_type('wallpaper')->get();

        }elseif(isset($firstKey['id']) && $firstKey['id']==0){

            $wallpaper=Post::GetTopChartWaV('wallpaper');

        }else{

            $wallpaper=[];
        }
        // dd($Wallcategory);
        $videocategory=[];
        $getvideocategory=Category::GetVideoCategory();
        $getTopChartVideo=Post::GetPostTopChartVideo();

        if(count($getTopChartVideo) > 0){
            $vdo['id']=0;
            $vdo['name']='Top video';
            $videocategory[]=$vdo;
        }

        if(count($getvideocategory) >0){
            foreach($getvideocategory as $key=>$vd){
                $videocategory[]= $vd;
            }
        }

        if(!empty($videocategory)){
            $vdofirstKey = array_values($videocategory)[0];
        }

        if(isset($vdofirstKey['id']) && $vdofirstKey['id']!=0){

            $video = Category::find($vdofirstKey['id'])->post()->wherePost_type('video')->get();

        }elseif(isset($vdofirstKey['id']) && $vdofirstKey['id']==0){

            $video=Post::GetTopChartWaV('video');

        }else{

            $video=[];
        }
        
        return view('content::wallpaper',compact('Wallcategory','wallpaper', 'videocategory', 'video', ));
    }

    public function wallpaper_details(Request $request,$uuid=null)
    {
        $details = Post::GetDetailById($uuid,$type='wallpaper',$application='')->first(); 
        $otherWallpaper = Post::GetSimilar($uuid, $type='wallpaper');

        return view('content::wallpaper_details',compact('details','otherWallpaper'));
    }
    
    public function video_details(Request $request,$uuid=null)
    {
        $video_details = Post::GetDetailById($uuid,$type='video',$application='')->first(); 
        $otherVideo = Post::GetSimilar($uuid, $type='video');

        return view('content::video_details',compact('video_details','otherVideo'));
    }
    

    public function see_more()
    {
        $Wallcategory=[];
        $category=Category::GetWallpaperCategory();
        $getTopChartWallpaper=Post::scopeGetTopChartWaV('wallpaper');
        // $getTopChartWallpaper=Post::GetPostTopChart();

        if(count($getTopChartWallpaper) > 0){

            $cat['id']=0;
            $cat['name']='Top Wallpaper';
            $Wallcategory[]=$cat;
        }
        if(count($category) >0){
            foreach($category as $key=>$cat){
                $Wallcategory[]= $cat;
            }
        }
        if(!empty($Wallcategory))
        $firstKey = array_values($Wallcategory)[0];

        if(isset($firstKey['id']) && $firstKey['id']!=0){

            $wallpaper = Category::find($firstKey['id'])->post()->wherePost_type('wallpaper')->get();

        }elseif(isset($firstKey['id']) && $firstKey['id']==0){

            $wallpaper=Post::scopeGetTopChartWaV('wallpaper');

        }else{

            $wallpaper=[];
        }


        return view('content::more_wallpaper',compact('Wallcategory','wallpaper'));
    }
    
    public function see_more_video()
    {
        $Vdocategory=[];
        $category=Category::GetVideoCategory();
        // $getTopChartVideo=Post::GetPostTopChartVideo();
        $getTopChartVideo=Post::scopeGetTopChartWaV('video');

        if(count($getTopChartVideo) > 0){

            $cat['id']=0;
            $cat['name']='Top Video';
            $Vdocategory[]=$cat;
        }
        if(count($category) >0){
            foreach($category as $key=>$cat){
                $Vdocategory[]= $cat;
            }
        }
        if(!empty($Vdocategory))
        $firstKey = array_values($Vdocategory)[0];

        if(isset($firstKey['id']) && $firstKey['id']!=0){

            $video = Category::find($firstKey['id'])->post()->wherePost_type('video')->get();

        }elseif(isset($firstKey['id']) && $firstKey['id']==0){

            $video=Post::scopeGetTopChartWaV('video');

        }else{

            $video=[];
        }


        return view('content::more_video',compact('Vdocategory','video'));
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
