<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Auth\AuthController as Auth;

class AuthController extends Auth
{

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    protected $guard = 'admin';

    protected $redirectAfterLogout = 'admin/login';
    
    protected $loginView = 'backend.layouts.login';
}
