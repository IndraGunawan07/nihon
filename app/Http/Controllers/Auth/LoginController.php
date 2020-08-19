<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    // protected function authenticated(Request $request,$user){
        // $id = Auth::username();
    //     if($user->role === 'Admin'){
    //         return RouteServiceProvider::HOME; //redirect to admin panel
    //     }
    
    //     // return redirect()->intended('/'); //redirect to standard user homepage
    //     // return RouteServiceProvider::HOME;
    // }

    // using username for authentication instead of email
    public function username()
    {   
         return 'username';   
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (auth()->user()->role == 'Admin') {
            return RouteServiceProvider::ADMIN;
        }
        return RouteServiceProvider::HOME;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
