<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    // protected function redirectTo()
    // {
    //     if (auth()->user()->status == 'active') {
    //         return '/home';
    //     }
    //     return '/';
    // }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function authenticated()
    // {
    //     if(auth()->user()->status == 'activo')
    //     {
    //         return redirect('/home');
    //     }

    //     return redirect('/');
    // }


    public function login(Request $request){

        // $message = array(
        //     'required.email'    =>  'This is required',
        //     'required.password' =>  'This is required',
        // );
        // $this->validate($request,[
        //     'email' =>  'required',
        //     'password'  =>  'required',
        // ],$message);

        $email = $request->email;
        $pass = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $pass, 'status' => 'Active'])){
           // Session::flash('success','Welcome '.Auth::user()->name);
            return redirect('home');
            // return redirect()->route('home');
        }else{
           // Session::flash('error','Sorry! Try Again. It seems your login credential is not correct.');
            return redirect('/');
            // return redirect()->back();
        }

    }
}


