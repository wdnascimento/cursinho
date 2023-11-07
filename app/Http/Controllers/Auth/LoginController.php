<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      dd('opa');
      if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route("cadastro"));
      }
      return redirect()->back()->withErrors(['message' => 'Usuário ou senha inválido.']);
    }


    // REGISTRAR O USUÁRIO

    public function showFormRegister(){

      return view('site.auth.register');

    }

    public function showFormLogin(){
        if (Auth::guard('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        return view('site.auth.login');

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
