<?php

namespace App\Http\Controllers\Backend;

use Validator;
use App\Http\Controllers\Auth\AuthController as auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends auth
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    protected $guard = 'admin';

    protected $redirectAfterLogout = 'admin/login';
    
    protected $loginView = 'backend.layouts.login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }
}
