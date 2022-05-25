<?php

namespace Modules\User\Http\Controllers;

use Hash;
use Auth;
use Cookie;
use Session;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\Register;
use Modules\User\Http\Requests\Login;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Modules\User\Entities\User;
use Modules\Domain\Entities\Domain;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->only(['user_list']);
    }
    
    public function index()
    {

        return view('user::login');
    }

    public function profile()
    {
        return view('user::profile');
    }

    public function logout()
    {
        Session::forget('user_data');

        return redirect('/');
    }
   
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('user::register');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Register $request)
    {
        $array = array();
        $validated = $request->validated();
        $token =  Hash::make($request->name);
        $token_email =  Crypt::encryptString($request->email);
         //set the User information in database
         $user_enrolled = User::create([
                                       'uuid' =>Str::random(8),
                                       'name' => $request->name,
                                       'email' => $request->email,
                                       'password' => Hash::make($request->password),
                                       'remember_token' =>$token,
                                     ]);

        // Your User query executed by using get()
        if(User::latest()->first()->id){
           $array = array(
                          'name' =>$request->name,
                          'secretkey' => $token,
                          'secretkey_email' => Crypt::encryptString(User::latest()->first()->id),   
           );

           
   //          $email = $request->email;
          
   //          Mail::send('emails.mail', $array, function($message) use ($email)
			// {
			// 	$message->from('no-reply@slypee.com');
			// 	$message->subject("Verification mail from newjazz.slyee.com");
			// 	$message->to($email);
			// });  
             
            return redirect('/registration/success');
        }else{
            return redirect('/admin/create');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        return view('user::register-success');
    }


    /* public function login()
    {
        return view('user::login');
    }
 */

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function login_email()
    {

        return view('user::login_email');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function verify($token,$key)
    {
        // echo $token;
        //dd($token);
        $decrypted_id = Crypt::decryptString($key);
        $check_email_existence = User::select('created_at')->CheckDetails($decrypted_id,$token)->get();
        if($check_email_existence){
            dd($check_email_existence->first()->created_at);

            
            die;
            $user = User::find($decrypted_id);
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->status = 'regular';
            $user->save();
            return view('user::login_email');  
        }else{
        
        }

        //return view('user::login-email');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
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

    public function termsandcondition(){
        return view('user::term-and-condition'); 
    }
    
    public function user_list(Request $request)
    {
        $domain = $_COOKIE["domain"];
        
        $list = User::getAllByDomain($domain)->get();
        
        return view('user::list', compact('list'));
    }

}
