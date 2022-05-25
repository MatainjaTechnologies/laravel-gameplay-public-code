<?php

namespace Modules\Reward\Http\Controllers;

use File;
use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Domain\Entities\Domain;
use Modules\Reward\Entities\Reward;
use Modules\Reward\Entities\RewardType;
use Modules\Reward\Http\Requests\RewardRequest;

class RewardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['index', 'get_rewards_by_type', 'reward_history','reward_details']);
    }
    
    public function index()
    {
        $UserData = '';
        $UserId = Session::get('UserId');
        
        if ($UserId) {
            $UserData = UserLogin::getDetailsById($UserId);
        }

        $all_types = RewardType::getAll();
        $all_reward = Reward::getAllByType($all_types[0]->id);
        
        return view('reward::reward', compact('all_types', 'all_reward', 'UserData'));
    }
    
    public function get_rewards_by_type(Request $request)
    {
        $res = [];
        $type_id = $request->type_id;
        $all_reward = Reward::getAllByType($type_id);
        $type_dtl = RewardType::getDetailsById($type_id);
        
        if (count($all_reward) > 0) {
            $res['status'] = true;
            $res['type'] = $type_dtl->name;
            $res['all_reward'] = $all_reward;
        }else {
            $res['status'] = false;
            $res['type'] = $type_dtl->name;
            $res['all_reward'] = $all_reward;
        }

        echo json_encode($res);
        exit;
    }
    
    public function reward_history()
    {
        $UserData = '';
        $UserId = Session::get('UserId');
        
        if ($UserId) {
            $UserData = UserLogin::getDetailsById($UserId);
        }
        
        return view('reward::reward_history', compact('UserData'));
    }
    
    public function reward_details($id)
    {
        $reward_dtl = Reward::getDetailById($id);
        // dd($reward_dtl);
        return view('reward::reward_details', compact('reward_dtl'));
    }

    
    /* Admin methods Start*/
    public function add_reward()
    {
        $all_types = RewardType::getAll();
        $domains = Domain::getAll()->orderBy('id', 'DESC')->get();

        return view('reward::add_reward', compact('all_types', 'domains'));
        // return view('reward::add_reward', compact('domains'));
    }
    
    public function reward_store(RewardRequest $request)
    {
        $request->validated();
        $thumb_image_name = '';
        $banner_image_name = '';


        $coin = $request->coin;
        $type = $request->type;
        $title = $request->title;
        $description = $request->description;

        $status = Reward::create([
            'coin' => $coin,
            'title' => $title,
            'is_active' => '1',
            'click_reward' => '0',
            'reward_type_id' => $type,
            'description' => $description,
            'date_created' => date('Y-m-d H:i:s'),
            
        ]);

        $last_id = $status['id'];

        

        if ($last_id) {

            if($request->hasFile('image')){

                //Banner image upload
                $banner_image = $request->file('image');
                $extention = $request->file('image')->extension();
                $img_name = $last_id.'_'.date('dmY').'_banner_image.'.$extention;
    
                //Banner image save destination
                $bnr_img_destination = public_path().'/uploads/reward/'.$last_id;
    
                if ( ! File::exists($bnr_img_destination)) {
                    File::makeDirectory($bnr_img_destination, 0777, true, true);
                }        
    
                if ($banner_image->move($bnr_img_destination, $img_name)) {
                    $banner_image_name = $img_name;
                }
            }

            if($request->hasFile('thumb_image')){

                //Thumb image upload
                $thumb_image = $request->file('thumb_image');
                $extention = $request->file('thumb_image')->extension();
                $t_img_name = $last_id.'_'.date('dmY').'_thumb_image.'.$extention;
    
                //Thumb image save destination
                $thmb_img_destination = public_path().'/uploads/reward/'.$last_id;
    
                if ( ! File::exists($thmb_img_destination)) {
                    File::makeDirectory($thmb_img_destination, 0777, true, true);
                }
    
    
                if ($thumb_image->move($thmb_img_destination, $t_img_name)) {
                    $thumb_image_name = $t_img_name;
                }
            }

            if ($banner_image_name != '' && $thumb_image_name != '') {

                $rwd_dtl = Reward::getDetailsById($last_id)->first();

                $rwd_dtl->reward_image = $thumb_image_name;
                $rwd_dtl->banner_image = $banner_image_name;
    
                if ($rwd_dtl->save()) {
                    return redirect('/admin/reward/list')->with('flash_message_success', 'Reward saved successfully');
                }else {
                    return redirect('/admin/reward/add')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
                }
            }else {
                return redirect('/admin/reward/list')->with('flash_message_success', 'Reward saved successfully');
            }
        }else {
            return redirect('/admin/reward/add')->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
        }
                
    }

    public function reward_list()
    {
        $rewards = Reward::orderBy('id', 'DESC')->all();
        $domains = Domain::getAll()->orderBy('id', 'DESC')->get();

        return view('reward::reward_list', compact('rewards', 'domains'));
        //dd($all);
    }

    public function edit_reward($id)
    {
        $all_types = RewardType::getAll();
        $rwd_dtl = Reward::getDetailsById($id)->first();
        $domains = Domain::getAll()->orderBy('id', 'DESC')->get();

        if ($rwd_dtl) {
            return view('reward::edit_reward', compact('rwd_dtl', 'all_types', 'domains'));
        } else {
            abort('404');
        }
    }

    public function reward_update(RewardRequest $request)
    {
        $request->validated();
        $thumb_image_name = '';
        $banner_image_name = '';

        $coin = $request->coin;
        $type = $request->type;
        $title = $request->title;
        $id = $request->reward_id;
        $description = $request->description;

        if($request->hasFile('image')){

            //Banner image upload
            $banner_image = $request->file('image');
            $extention = $request->file('image')->extension();
            $img_name = $id.'_'.date('dmY').'_banner_image.'.$extention;

            //Banner image save destination
            $bnr_img_destination = public_path().'/uploads/reward/'.$id;

            if ( ! File::exists($bnr_img_destination)) {
                File::makeDirectory($bnr_img_destination, 0777, true, true);
            }        

            if ($banner_image->move($bnr_img_destination, $img_name)) {
                $banner_image_name = $img_name;
            }

        }

        if($request->hasFile('thumb_image')){

            //Thumb image upload
            $thumb_image = $request->file('thumb_image');
            $extention = $request->file('thumb_image')->extension();
            $t_img_name = $id.'_'.date('dmY').'_thumb_image.'.$extention;

            //Thumb image save destination
            $thmb_img_destination = public_path().'/uploads/reward/'.$id;

            if ( ! File::exists($thmb_img_destination)) {
                File::makeDirectory($thmb_img_destination, 0777, true, true);
            }


            if ($thumb_image->move($thmb_img_destination, $t_img_name)) {
                $thumb_image_name = $t_img_name;
            }

        }

        $rwd_dtl = Reward::getDetailsById($id)->first();

        $rwd_dtl->coin = $coin;
        $rwd_dtl->title = $title;
        $rwd_dtl->reward_type_id = $type;
        $rwd_dtl->description = $description;

        if ($banner_image_name != '' ) {
            $rwd_dtl->banner_image = $banner_image_name;
        }
        if ($thumb_image_name != '') {
            $rwd_dtl->reward_image = $thumb_image_name;
        }

        if ($rwd_dtl->save()) {
            return redirect('/admin/reward/list');
        }else {
            return redirect('/admin/reward/edit/'.$id)->withInput()->with('flash_message_error', 'Somthing went wrong, try again later ');
        }
        
    }

    public function reward_delete(Request $request)
    {
        $res = [];    
        $id = $request->reward_id;

        $status = Reward::getRwdDelete($id);

        if ($status) {
            $res['status'] = true;
            $res['msg'] = 'Reward deleted successfully';
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later ';
        }
        
        echo json_encode($res);
    }

    public function update_status(Request $request)
    {
        $res = [];
        $id = $request->reward_id;
        $status = $request->status;

        if ($status) {
            $msg = 'Reward activated';
        }else {
            $msg = 'Reward deactivated';            
        }

        // dd($status);
        $dtl = Reward::getDetailsById($id)->first();
        $dtl->is_active = $status;


        if ($dtl->save()) {
            $res['status'] = true;
            $res['msg'] = $msg;
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';            
        }

        echo json_encode($res);
    }
    /* Admin methods end*/
}
