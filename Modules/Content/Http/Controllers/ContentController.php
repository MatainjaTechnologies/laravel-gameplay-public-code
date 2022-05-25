<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Game\Entities\Game;
use Modules\Content\Http\Requests\PostRequest;
use Modules\Content\Http\Requests\WallpaperRequest;
use Modules\Content\Http\Requests\VideoRequest;
use Modules\Content\Entities\Post;
use Illuminate\Support\Str;
use Modules\Media\Entities\Media;
use Session;
use File;
use Validator;
use Illuminate\Validation\Rule;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $category=[];
        $categoryList=Category::select("id","name")->whereType('app')->whereStatus(1)->get()->toArray();
        $getTopChartApp=Post::wherePost_type('application')->whereTop_chart('yes')->get();

        if(count($getTopChartApp) > 0){

             $cat['id']=0;
             $cat['name']='Top Chart';
             $category[]=$cat;
        }

        if(count($categoryList) >0){
            foreach($categoryList as $key=>$cat){
                $category[]= $cat;
            }
        }

        $firstKey = array_values($category)[0];
        //$firstId = isset($firstKey['id']) ? $firstKey['id'] : '';

        if(isset($firstKey['id']) && $firstKey['id']!=0){

            $games = Category::find($firstKey['id'])->post()->wherePost_type('application')->get();

        }elseif(isset($firstKey['id']) && $firstKey['id']==0){

            $games=Post::wherePost_type('application')->whereTop_chart('yes')->get();

        }else{

            $games=[];
        }

        return view('content::index',compact('category','games'));
    }


    public function create_app()
    {
        $category =[];
        $category=Category::select("id","name")->whereType('app')->whereStatus(1)->get();

        return view('content::create_app',compact('category'));
    }

    public function app_store(PostRequest $request)
    {
        $validated = $request->validated();

        $imageName = $request->image->getClientOriginalName();
        $fileName = $request->apk_file->getClientOriginalName();
  
        $uuid = Str::uuid();
        $app = Post::create([
            'uuid' =>$uuid,
            'name' => $request->name,
            'category_id' => $request->category,
            'rating'=>$request->rating,
            'description' => $request->description,
            'is_home' => $request->home,
            'image' => $imageName,
            'file' => $fileName,
            'post_type' => 'application',
            'application_type' => $request->application_type,
            'application_platform' => $request->application_platform,
            'top_chart'=>'no',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
            'price' =>$request->price,
        ]);

        $last_id = $app['id'];
        $path = public_path().'/uploads/application/'.$uuid.'/image';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $request->image->move($path, $imageName);

        if($request->file('apk_file')){


            //Create dynamic appication file folder
            $application_files_path = public_path().'/uploads/application/'.$uuid.'/file';

            if(!File::exists($application_files_path)) {
                File::makeDirectory($application_files_path, 0777, true, true);
            }

            $request->apk_file->move($application_files_path, $fileName);
        }


        //Multiple image upload and array push.
        
        //upload begins
        $destinationPath = public_path().'/uploads/media/application/'.$last_id;
        if ( ! File::exists($destinationPath) ) {
            //create directory if doesnt exist
            File::makeDirectory($destinationPath, 0777, true, true);
        }   
        //move the files to the location
        $i = 0;
       if($image = $request->file('Screenshot_upload')){
           // check folder exist or not 
        
        foreach ($request->file('Screenshot_upload') as $file) {
           // upload path
           $name = $file->getClientOriginalName();
          
           $file->move($destinationPath, $name);
           $insert[] = $name;
           $count = $i++;
        }
       }
       
      $serilize_data = serialize($insert);
      //dd(unserialize($serilize_data));
      $media_save = Media::create([
        'post_type' => 'application',
        'post_id' => $last_id,
        'media' => $serilize_data,
        'status'=> 1,
        'created_at' => now()->format('Y-m-d H:i:s'),
        'updated_at' => now()->format('Y-m-d H:i:s'),
        'total_images' => $count,                               
      ]);

        session()->flash('success', 'App created successfully');
        return redirect('/content/admin/app-list');
    }


    public function app_list()
    {
        return view('content::showApk');
    }

    public function ajax_content_list(Request $request)
    {
        $data_arr=[];
        $game=Post::get();
        $post_type = $request->post('post_type');

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $search_arr = $request->get('search');
        $order_arr = $request->get('order');
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');


        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
         $totalRecords = Post::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Post::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
         $records = Post::orderBy($columnName,$columnSortOrder)
           ->where('post.post_type', $post_type)
           ->where('post.name', 'like', '%' .$searchValue . '%')
           ->select('post.*')
           ->skip($start)
           ->take($rowperpage)
           ->get();

        if(count($records)>0){
            $count = 1;
            foreach($records as $record){
                $id = $record['id'];
                $name = $record['name'];
                $img = asset('/uploads/'.$post_type.'/'.$record['uuid'].'/image/'.$record['image']);
                $description = $record['description'];
                $top_chart = 'no';
                $uuid = $record['uuid'];

                $data_arr[] = array(
                  "id" => $id,
                  "name" => $name,
                  'image' => '<img src='.$img.' alt="Game Image"  height="60">',
                  "description" => $description,
                  "top_chart" => $top_chart,
                  'action' => '<a href="#" class="btn btn-info btn-sm "><i class="fa fa-pencil-square-o"></i></a>'
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

    public function create_wallpaper()
    {
        $category =[];
        $category=Category::select("id","name")->whereType('wallpaper')->whereStatus(1)->get();

        return view('content::create_wallpaper',compact('category'));
    }

    public function store_wallpaper(WallpaperRequest $request)
    {
        $validated = $request->validated();

        $imageName = $request->image->getClientOriginalName();
        $download_image = uniqid().$request->download_image->getClientOriginalName();


        $uuid = Str::uuid();
        $app = Post::create([
            'uuid' =>$uuid,
            'name' => $request->name,
            'category_id' => $request->category,
            'rating'=>$request->rating,
            'description' => $request->description,
            'is_home' => $request->home,
            'image' => $imageName,
            'file' => $download_image,
            'post_type' => 'wallpaper',
            'top_chart'=>'no',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
            'price' =>$request->price,
        ]);

        $last_id = $app['id'];
        $path = public_path().'/uploads/wallpaper/'.$uuid.'/image';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $request->image->move($path,$imageName);

        if($request->file('download_image')){


            //Create dynamic appication file folder
            $application_files_path = public_path().'/uploads/wallpaper/'.$uuid.'/file';

            if(!File::exists($application_files_path)) {
                File::makeDirectory($application_files_path, 0777, true, true);
            }

            $request->download_image->move($application_files_path,$download_image);
        }

        session()->flash('success', 'wallpaper created successfully');
        return redirect('/content/admin/wallpaper-list');
    }

    public function wallpaper_list()
    {
        return view('content::showWallpaper');
    }

    public function create_video()
    {
        $category =[];
        $category=Category::select("id","name")->whereType('video')->whereStatus(1)->get();

        return view('content::create_video',compact('category'));
    }

    public function store_video(VideoRequest $request)
    {
        $validated = $request->validated();

        $imageName = $request->image->getClientOriginalName();
        $video_file = $request->video_file->getClientOriginalName();

        $uuid = Str::uuid();
        $app = Post::create([
            'uuid' =>$uuid,
            'name' => $request->name,
            'category_id' => $request->category,
            'rating'=>$request->rating,
            'description' => $request->description,
            'is_home' => $request->home,
            'image' => $imageName,
            'file' => $video_file,
            'post_type' => 'video',
            'top_chart'=>'no',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);

        $last_id = $app['id'];
        $path = public_path().'/video/'.$uuid.'/image';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $request->image->move($path, $imageName);

        if($request->file('video_file')){


            //Create dynamic appication file folder
            $application_files_path = public_path().'/video/'.$uuid.'/file';

            if(!File::exists($application_files_path)) {
                File::makeDirectory($application_files_path, 0777, true, true);
            }

            $request->video_file->move($application_files_path, $video_file);
        }

        //Multiple image upload and array push.

        //upload begins
        $destinationPath = public_path().'/uploads/media/application/'.$last_id;
        if ( ! File::exists($destinationPath) ) {
            //create directory if doesnt exist
            File::makeDirectory($destinationPath, 0777, true, true);
        }
        //move the files to the location

       if($image = $request->file('multiple_image_file')){
           // check folder exist or not
        foreach ($image as $file) {
           // upload path
           $name = $file->getClientOriginalName();
           $file->move($destinationPath, $name);
           $insert[] = $name;
        }
       }
      $serilize_data = serialize($insert);
      //dd(unserialize($serilize_data));
      $media_save = Media::create([
        'post_type' => 'video',
        'post_id' => $last_id,
        'media' => $serilize_data,
        'status'=> 1,
        'created_at' => now()->format('Y-m-d H:i:s'),
        'updated_at' => now()->format('Y-m-d H:i:s'),
      ]);

        session()->flash('success', 'Video created successfully');
        return redirect('/content/admin/video-list');
    }

    /**
     * Search the specified Content in Post Like Wallpaper App.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function search()
    {

        $query = Post::query();

        $post = app(Pipeline::class)
            ->send($query)
            ->through([
                \Modules\Content\QueryFilter\Active::class,
                \Modules\Content\QueryFilter\Search::class,
                \Modules\Content\QueryFilter\PostType::class,
                \Modules\Content\QueryFilter\TopPost::class

            ])
            ->thenReturn()
        ->get();
        
        return view('content::search', compact('post'));
    }
    public function video_list()
    {
        return view('content::showVideo');
    }

    public function getDetailsByCatId(Request $request)
    {

        $category_id = $request->post('cat_id');
        $type = $request->post('type');
        $application = $request->post('application');

        if($category_id == 0){

            $data = Post::GetTopChartresult($type,$application);

        }else{

            $data = Category::find($category_id)->post()->wherePost_type($type)->whereApplication_type($application)->get();
        }

        return Response()->json([
            "success" => true,
            "result" => $data,
            "type"=> $type
        ]);
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
