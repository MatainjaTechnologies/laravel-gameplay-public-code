<?php

namespace Modules\Category\Http\Controllers;

use File;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Requests\CategoryRequest;

use Modules\Game\Entities\Game;
use Modules\Domain\Entities\Domain;
use Modules\Category\Entities\Category;
use Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['index', 'category_game', 'category_details','getAllCat']);
    }

    public function index()
    {
        $categories = Category::categoryActive()->orderBy('id', 'DESC')->get();

        return view('category::index', compact('categories'));
    }

    public function category_game(Request $request, $id)
    {
    $validator = Validator::make(['id' => $id], [
    'id' => 'required|numeric'
      ]);

        if ($validator->fails()) {
            abort(404);
        }

        $paginate = 10;
        if ($request->ajax()) {

            $html = '';

            $games = [];
            $page = $request->get('page');

            if ($id != 'top_chart') {

                $data = Game::getPaginateByCategory($id, $paginate);
                foreach ($data as $key => $value) {
                    $cat_dtl = Category::getOneCategoryById($value->category_id)->first();

                    $src = asset('/uploads/games/'.$value->id.'/cover_image/'.$value->cover_image);
                    $html .="<div class='col-6'><div class='game-list'><img src='".$src."' alt='Game'><div class='row no-gutters mt-2'><div class='col-8'><h6 class='mb-0 text-truncate'>".$value->name."</h6><small class='text-secondary'>".$cat_dtl->name."</small></div><div class='col-4 text-right'><a href='".url('/game/'.$value->uuid)."' class='btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase'>Play</a></div></div></div></div>";
                    $value->category_name = $cat_dtl->name;

                    $games[] = $value;
                }

            } else {

                $data = Game::getTopChartPaginateGames($paginate);
                foreach ($data as $key => $value) {
                    $cat_dtl = Category::getOneCategoryById($value->category_id)->first();

                    $src = asset('/uploads/games/'.$value->id.'/cover_image/'.$value->cover_image);
                    $html .="<div class='col-6'><div class='game-list'><img src='".$src."' alt='Game'><div class='row no-gutters mt-2'><div class='col-8'><h6 class='mb-0 text-truncate'>".$value->name."</h6><small class='text-secondary'>".$cat_dtl->name."</small></div><div class='col-4 text-right'><a href='".url('/game/'.$value->uuid)."' class='btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase'>Play</a></div></div></div></div>";
                    $value->category_name = $cat_dtl->name;

                    $games[] = (object)$value;
                }

            }

            return $html;


            $res['games'] = $games;
            $res['more'] = $data->hasMorePages();

            echo json_encode($res);
            exit();

        } else {

            if ($id != 'topchart') {
                $cat = Category::getOneCategoryById($id)->first();
                $name = $cat->name;
                $games = Game::getPaginateByCategory($id, $paginate);
                 if(empty($games))
                        {
                             abort(404);
                        }

            }else {
                $id = 'top_chart';
                $name = 'Top Chart';
                $games = Game::getTopChartPaginateGames($paginate);
            }

   
            return view('category::category_games', compact('id', 'name', 'games'));
        }

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::create');
    }

    public function cat_store(CategoryRequest $request)
    {
        $validated = $request->validated();

        $icon_image_name = '';
        $banner_image_name = '';

        $name = $request->name;
        // $description = $request->description;

        $low_name = strtolower($name);
        $slug = str_replace(' ', '_', $low_name);

        $status = Category::create([
            'name' => $name,
            'uuid' =>Str::uuid(),
            'slug' => $slug,
            'type' => 'game',
        ]);

        $last_id = $status['uuid'];
        // dd($last_id);
        if($last_id) {

            if($request->hasFile('image')){

                //Banner image upload
                $banner_image = $request->file('image');
                $extention = $request->file('image')->extension();
                $img_name = $last_id.'_'.date('dmYHis').'_banner_image.'.$extention;

                //Banner image save destination
                $bnr_img_destination = public_path().'/uploads/category/'.$last_id.'/banner/';

                if ( ! File::exists($bnr_img_destination)) {
                    File::makeDirectory($bnr_img_destination, 0777, true, true);
                }


                if ($banner_image->move($bnr_img_destination, $img_name)) {
                    $banner_image_name = $img_name;
                }
            }

            if ($request->hasFile('icon')) {

                //Icon image upload
                $icon_image = $request->file('icon');
                $icon_extention = $request->file('icon')->extension();
                $icon_img_name = $last_id.'_'.date('dmYHis').'_icon_image.'.$icon_extention;

                //Icon image save destination
                $icn_img_destination = public_path().'/uploads/category/'.$last_id.'/icon/';

                if ( ! File::exists($icn_img_destination)) {
                    File::makeDirectory($icn_img_destination, 0777, true, true);
                }

                if ($icon_image->move($icn_img_destination, $icon_img_name)) {
                    $icon_image_name = $icon_img_name;
                }
            }

            if ($banner_image_name || $icon_image_name) {

                $cat_dtl = Category::getOneCategory($last_id)->first();

                if ($banner_image_name) {
                    $cat_dtl->banner = $banner_image_name;
                }

                if ($icon_image_name) {
                    $cat_dtl->icon = $icon_image_name;
                }

                if ($cat_dtl->save()) {
                    return redirect('/admin/category/all')->with('flash_message_success', 'Category saved successfully');
                }else {
                    return redirect('/admin/category/add')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
                }
            }else {
                return redirect('/admin/category/all')->with('flash_message_success', 'Category saved successfully');
            }
        }else {
            return redirect('/admin/category/add')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
        }
    }

    public function category()
    {
        $categories =[];

        $categories= Category::getCategories()->where('is_deleted', null)->get();
        // dd($categories);
        return view('category::category', compact('categories'));
    }

    /**
     * Fetch single category data
     */
    public function category_details(Request $request)
    {
        $category_uuid = $request->post('cat_uuid');

       

        $cat_dtl = Category::getCategory($category_uuid);

        



        return Response()->json([
            "success" => true,
            "cat_dtl" => $cat_dtl
        ]);
    }

    public function edit($uuid)
    {

        $cat_detl = Category::getOneCategory($uuid)->first();

        return view('category::edit', compact('cat_detl'));
    }

    /**
     * Update category data
     */
    public function cat_update(CategoryRequest $request)
    {
        $validated = $request->validated();

        $icon_image_name = '';
        $banner_image_name = '';

        $low_name = strtolower($request->name);
        $slug = str_replace(' ', '_', $low_name);

        $cat_detl = Category::getOneCategory($request->uuid)->first();

        if($request->hasFile('image')){

            //Banner image upload
            $banner_image = $request->file('image');
            $extention = $request->file('image')->extension();
            $img_name = $request->uuid.'_'.date('dmYHis').'_banner_image.'.$extention;

            //Banner image save destination
            $bnr_img_destination = public_path().'/uploads/category/'.$request->uuid.'/banner/';

            if ( ! File::exists($bnr_img_destination)) {
                File::makeDirectory($bnr_img_destination, 0777, true, true);
            }


            if ($banner_image->move($bnr_img_destination, $img_name)) {
                $banner_image_name = $img_name;
            }
        }

        if ($request->hasFile('icon')) {

            //Icon image upload
            $icon_image = $request->file('icon');
            $icon_extention = $request->file('icon')->extension();
            $icon_img_name = $request->uuid.'_'.date('dmYHis').'_icon_image.'.$icon_extention;

            //Icon image save destination
            $icn_img_destination = public_path().'/uploads/category/'.$request->uuid.'/icon/';

            if ( ! File::exists($icn_img_destination)) {
                File::makeDirectory($icn_img_destination, 0777, true, true);
            }

            if ($icon_image->move($icn_img_destination, $icon_img_name)) {
                $icon_image_name = $icon_img_name;
            }
        }

        $cat_detl->name = $request->name;
        $cat_detl->slug = $slug;

        if ($banner_image_name) {
            $cat_detl->banner = $banner_image_name;
        }

        if ($icon_image_name) {
            $cat_detl->icon = $icon_image_name;
        }

        if ($cat_detl->save()) {
            return redirect('/admin/category/all')->with('flash_message_success', 'Category updated successfully');
        }else {
            return redirect('/admin/category/'.$request->uuid.'/edit')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
        }

    }

    public function update_status(Request $request)
    {
        $res = [];
        $uuid = $request->cat_uuid;
        $status = $request->status;

        if ($status) {
            $msg = 'Category activated';
        }else {
            $msg = 'Category deactivated';
        }

        $dtl = Category::getOneCategory($uuid)->first();
        $dtl->status = $status;


        if ($dtl->save()) {
            $res['status'] = true;
            $res['msg'] = $msg;
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        echo json_encode($res);
    }

    public function destroy(Request $request)
    {
        $uuid = $request->cat_uuid;
        $cat_detl = Category::getOneCategory($uuid)->first();

        $cat_detl->is_deleted = '1';

        if ($cat_detl->save()) {
            $res['status'] = true;
            $res['msg'] = 'Category deleted successfully';
        } else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        echo json_encode($res);
        exit();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('category::show');
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


    public function getAllCat()
    {
        $category=Category::getAllCat();

        dd($category->rating);
    }
}
