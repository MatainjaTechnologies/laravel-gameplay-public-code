<?php

namespace Modules\Notify\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use Modules\User\Entities\Subscribe;
use Illuminate\Support\Str;
use Hash;
use Auth;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $id = $request->post('id');
        $msisdn = ltrim($request->post('msisdn'), '0');
        $event = $request->post('event');
        $status = $request->post('status');
        $timestamp = $request->post('timestamp');
        if((isset($id) && is_numeric($id)) && (isset($msisdn) && is_numeric($msisdn)) && (isset($event) && is_numeric($event)) && (isset($status) && is_numeric($status) && $status==1) && (isset($timestamp) && is_numeric($timestamp))){

            $subscribe_data = array();
            $subscribe_date = date('Y-m-d H:i:s', strtotime($timestamp));
            $password = mt_rand(1000,9999);

            if($event==7 || $event==1 || $event==2 || $event==3){
                $check_member = User::CheckUserExist($msisdn);

                if($event == 7){
                    $nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 4 day'));
                    $sub_token = 6;
                }
                if ($event == 1){
                    $nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 2 day'));
                    $sub_token = 2;
                }
                if ($event == 2){
                    $nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 8 day'));
                    $sub_token = 12;
                }
                if ($event == 3){
                    $nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 1 day'));
                    $sub_token = 1;
                }                    
                
                if(count($check_member)==0)     
                { 
                        $token =  Hash::make($request->name);
                        $uuid = Str::random(8);
                        $user_enrolled = User::create([
                                       'uuid' =>$uuid,
                                       'msisdn'=>$msisdn,
                                       'name' => 'demo',
                                       'email' => $uuid.'@gmail.com',
                                       'password' =>'',
                                       'remember_token' =>$token,
                                     ]);

                        $subscribe_data = Subscribe::create([
                                        'user_id'=>User::latest()->first()->id,
                                        'package' => 1,
                                        'status'  => 'yes', 
                                        'lastcharge' => $subscribe_date,
                                        'nextcharge' => $nextcharge,
                                        'token' => $sub_token,
                                        'token_status' => 1

                                        ]);
                    if(Subscribe::latest()->first()->id){
                        echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
                    }else{
                        echo json_encode(array('state'=>'FAILED','error'=>'Data not inserted.','params'=>$_GET));
                    }
                }else{

                    if($check_member['status']=='no'){

                        Subscribe::find($check_member['id'])->update([
                            'package' => 1,
                            'status'  => 'yes', 
                            'lastcharge' => $subscribe_date,
                            'nextcharge' => $nextcharge,
                            'token' => $sub_token,
                            'token_status' => 1
                        ]);
                        echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));    

                    }else{
                     
                        echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is ACTIVE.','params'=>$_GET));

                    } 
                }
            
            }else if($event==5){

                $check_member = User::CheckUserExist($msisdn);

                if(count($check_member) >0 && $check_member['status']=="yes"){

                    Subscribe::find($check_member['id'])->update([
                            'package' => 0,
                            'status'  => 'no', 
                            'token' => 0,
                            'token_status' => 0
                    ]);

                    echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
                    
                }else{
                    echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is INACTIVE.','params'=>$_GET));
                }
            }

        }else{
            echo json_encode(array('state'=>'FAILED','error'=>'Enter valid params.','params'=>$_GET));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('notify::create');
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
        return view('notify::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notify::edit');
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
