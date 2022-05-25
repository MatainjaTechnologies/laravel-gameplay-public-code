<?php

namespace Modules\Admin\Http\Controllers;

use Session;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Modules\Admin\Entities\Admin;
use Modules\Domain\Entities\Domain;
use Modules\User\Entities\Subscribe;
use Modules\Subscription\Entities\Subscriber;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['index', 'create']);
    }

    public function index()
    {
        if(Auth::guard('admin')->check()){

            return redirect('admin/dashboard');
        }
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data= $request->input();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                // Cookie::queue(Cookie::forget('domain'));
                setcookie('domain',request()->getHost(), 0, '/');
                return redirect('admin/dashboard');
            }else{
               return redirect('/admin')->with('flash_message_error','Invalid Username Or Password');
            }
        }
        return view('admin::index');
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
    public function dashboard(Request $request)
    {
        $all = Subscriber::getAllNewSubs();
        // dd($all);
        return view('admin::dashboard', compact('all'));

    }
    

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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
    
    public function set_cookie(Request $request)
    {
        Cookie::queue(Cookie::forget('domain'));
        $name = $request->val;

        setcookie('domain',$name, 0, '/');

        echo json_encode(true);
        exit();
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('domain'));
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('flash_message_success','Logged Out Successfully');
    }

}
