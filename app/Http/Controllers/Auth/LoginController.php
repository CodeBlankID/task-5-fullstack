<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view("/auth/login");
    }

    public function dologin(Request $request){

       
        $login= $request->validate([
            "email"=>"required|string",
            "password"=>"required|string"

        ]);
      
        if(! Auth::attempt($login)){
            
            return redirect()->route('showlogin')->with('status', 'Invalid Credential');
        }else{
            return redirect()->route('home')->with('status', 'Login Successfully');
        }

        $user = User::where('email', $request->email)->firstOrFail();;
        $token= $user->createToken('accesstoken')->accessToken;
        // return response()->json([

        //     'user'=>$user,
        //     'access_token'=>$token
        // ]);
        
    }

    public function logout()
    {
       
        Session::flush();
        Auth::logout();
        return redirect()->route('showlogin')->with('status', 'Logout Successfully');
    }
}
