<?php

namespace Modules\Subscription\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

use Modules\User\Entities\User;
use Modules\Domain\Entities\Domain;
use Modules\User\Entities\Subscribe;
use Modules\Subscription\Entities\Subscriber;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $msisdn = $request->msisdn;
        Session::put('user_data', $msisdn);

        $name = Str::random(5);
        // dd($name);
        $data = Domain::getByName(request()->getHost())->first();
        if ($data) {
            $data->msisdn = $msisdn;

            $d_s = strstr($data->daily_subs_url, "msisdn", true); 
            $data->daily_subs_url = $d_s.'msisdn=66'.$msisdn;

            $w_s = strstr($data->weekly_subs_url, "msisdn", true); 
            $data->weekly_subs_url = $w_s.'msisdn=66'.$msisdn;

            $m_s = strstr($data->monthly_subs_url, "msisdn", true); 
            $data->monthly_subs_url = $m_s.'msisdn=66'.$msisdn;
            
            $y_s = strstr($data->yearly_subs_url, "msisdn", true); 
            $data->yearly_subs_url = $y_s.'msisdn=66'.$msisdn;
        }
        // dd($data);

        return view('subscription::index', compact('data', 'name'));
    }

    public function subscribe(Request $request)
    {
        $subs_day = '+1 day';
        $uuid = Str::uuid();
        $date_today = date('Y-m-d H:i:s');
        $refcode = $request->refcode;
        $domain = request()->getHost();

        $msisdn = Session::get('user_data');

        $status = User::create([
            'uuid' => $uuid,
            'msisdn' => $msisdn,
            'name' => $refcode,
            'email' => $refcode.'@demo.com',
            'password' => Hash::make($msisdn),
            'domain' => $domain,
        ]);
        
        $last_id = $status->value('id');
        
        if ($last_id) {
            
            $package = '1';
            Session::forget('user_data');

            $s_status = Subscribe::create([
                'user_id' => $last_id,
                'package' => $package,
                'lastcharge' => $date_today,
                'nextcharge' => date('Y-m-d H:i:s', strtotime($subs_day)),
                'token' => '0',
                'token_status' => '0',
                'status' => '1',
            ]);
            
            $l_status = Subscriber::create([
                'user_id' => $last_id,
                'msisdn' => $msisdn,
                'package' => $package,
                'start_date' => $date_today,
                'end_date' => date('Y-m-d H:i:s', strtotime($subs_day)),
                'recharge_date' => date('Y-m-d H:i:s', strtotime($subs_day)),
            ]);
            
            if ($s_status['id'] && $l_status['id']) {

                $user_data = [
                    'uuid' => $uuid,
                    'msisdn' => $msisdn,
                    'name' => $refcode,
                    'email' => $refcode.'@demo.com',
                    'domain' => $domain,
                    'subscription' => true,
                ];
    
                Session::put('user_data', $user_data);
    
                return redirect('/profile');

            }
        }
    }

    public function subscription_log()
    {
        $all = Subscriber::getAllByDate();
        // dd($all);
        return view('subscription::logs', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscription::create');
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
        return view('subscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('subscription::edit');
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
