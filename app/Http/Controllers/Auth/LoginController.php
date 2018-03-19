<?php

namespace Train\Http\Controllers\Auth;

use Train\Http\Controllers\Controller;
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

    use AuthenticatesUsers;
    
       

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
{
    return '/admin';
}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        
    }
    public function showLoginForm()
    {
       
        if(\Illuminate\Support\Facades\Auth::check()){
            
            redirect('/');
        }
        return view(env('THEME').'.login')->with('title','Вхід на сайт');
    }
    public function redirectPath(){
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }
   
}
