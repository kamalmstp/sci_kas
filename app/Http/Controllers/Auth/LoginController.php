<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected function validateLogin(Request $request): void
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    protected function redirectTo()
    {
        $redirectPath = RouteServiceProvider::HOME;

        if (auth()->user()->level === User::ADMIN) {
            $redirectPath = route('admin.index');
        } else if (auth()->user()->level === User::DRIVER) {
            $redirectPath = route('driver.index');
        }

        return $redirectPath;
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
    
    public function username(): string
    {
        return 'username';
    }
}
