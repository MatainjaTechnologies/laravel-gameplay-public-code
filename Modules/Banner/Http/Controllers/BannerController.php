<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Banner\Http\Requests\BannerRequest;
use Modules\Banner\Http\Requests\BannerRequestImgWO;

use Modules\Game\Entities\Game;
use Modules\Domain\Entities\Domain;
use Modules\Banner\Entities\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }
    
    public function index()
    {
        //Get home banner list
        $bnrs=Banner::GetBanners();

        // Get All Games which are not deleted
        $games=Game::getAllGame();

        $banners['game_list'] = $games;
        $banners['banner_list'] = $bnrs;


        return view('banner::banner_list', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(BannerRequest $b_request)
    {
        $validated = $b_request->validated();

        //Image upload
        $imageName = $b_request->banner_image->getClientOriginalName();

        $path = public_path().'/uploads/banner/';
        $b_request->banner_image->move($path, $imageName);

        $bnr = Banner::create([
            'image' => $imageName,
            'game_id' => $b_request->game,
            'position' => 'Home',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);

        session()->flash('success', 'Home Banner added successfully');
        return redirect()->back();
    }

    /**
     * Get Banner Details
     */
    public function banner_details(Request $request)
    {
        $banner_id = $request->post('bnr_id');
        $bnr_dtl = Banner::find($banner_id);

        return Response()->json([
            "success" => true,
            "bnr_dtl" => $bnr_dtl
        ]);
    }

    /**
     * Edit banner details
     */
    public function editBanner(BannerRequestImgWO $request)
    {
        $imageName = '';

        if($request->hasFile('banner_image')){

           $validated = $request->validated();

            //Image upload
            $imageName = $request->banner_image->getClientOriginalName();

            $path = public_path().'/uploads/banner/';
            $request->banner_image->move($path, $imageName);
        }

        if($request->game_id == null){
            $request->validate([
                'game_id' => 'required'
            ]);
        }

        $bnr_dtl = Banner::select()->BnrDetails($request->banner_id)->first();

        if($imageName != ''){
            $bnr_dtl->image = $imageName;
        }
        $bnr_dtl->game_id =$request->game_id;

        $bnr_dtl->save();

        session()->flash('success', 'Banner edited successfully');

        return redirect()->back();

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
        return view('banner::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('banner::edit');
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
