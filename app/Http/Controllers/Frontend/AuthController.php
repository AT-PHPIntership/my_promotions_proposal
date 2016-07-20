<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Auth\AuthController as Auth;

class AuthController extends Auth
{

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $loginView = 'frontend.auth.login';

    /**
     * Where to store view register.
     *
     * @var string
     */
    protected $registerView = "frontend.auth.register";
}
