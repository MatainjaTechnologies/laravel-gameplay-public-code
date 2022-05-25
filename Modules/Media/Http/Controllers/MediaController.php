<?php
namespace Modules\Media\Http\Controllers;

use File;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Modules\Content\Http\Requests\MediaRequest;
use Modules\Media\Entities\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('content::showMedia');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('content::create_media');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function media_store(Request $request)
    {
        $destinationPath = public_path().'uploads/media/image/'.$request->media_path;
        if ( ! File::exists($destinationPath) ) {

            //create directory if doesnt exist
            File::makeDirectory($destinationPath, 0777, true, true);
        }   
            //move the files to the location

           // dd($request->file('image'));
       if($image = $request->file('image')){
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
      
       $media_create = Media::create([
        'media_type' => $request->media_type,
        'media' => $serilize_data,
        'status'=> 1,
        'created_at' => now()->format('Y-m-d H:i:s'),
        'updated_at' => now()->format('Y-m-d H:i:s'),
       ]);
        
       if(Media::latest()->first()->id){
        return view('content::showMedia');
       }else{
        return view('content::create_media');
       }

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
    
    public function ajax_media_list(Request $request)
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
         $totalRecords = Media::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Media::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
         $records = Post::orderBy($columnName,$columnSortOrder)
           ->where('media.post_type', $post_type)
           ->where('media.name', 'like', '%' .$searchValue . '%')
           ->select('media.*')
           ->skip($start)
           ->take($rowperpage)
           ->get();

        if(count($records)>0){
            $count = 1; $i = 0;
            foreach($records as $record){
                $data = unserialize($record['media']);
                $id = $record['id'];
                $name = $record['media_type'];
                $img = asset('/uploads/media/images/'.$record['media_type'].'/'.$data[$i]);
                $status = $record['status'];
    
                $data_arr[] = array(
                  "id" => $id,
                  "name" => $name,
                  'image' => '<img src='.$img.' alt="Game Image"  height="60">',
                  "status" => $status,
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
