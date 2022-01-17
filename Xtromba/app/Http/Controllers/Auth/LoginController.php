<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Helpers\Mautic;
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

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated($request , $user){

         // Updates the last seen date on Mautic
         $Mautic = new Mautic;
         $Mautic->checkIn(auth()->user()->email);
        if($user->can("admin.home")){

            return redirect()->route('panel.home') ;
        }else{
            return redirect()->route('public.home.page') ;
        }
        
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
