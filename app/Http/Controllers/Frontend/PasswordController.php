<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Auth\PasswordController as Password;

class PasswordController extends Password
{

    /**
     * Where to redirect login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Where to store view send mail forget password.
     *
     * @var string
     */
    protected $linkRequestView = 'frontend.auth.passwords.email';

    /**
     * Where to store view reset password.
     *
     * @var string
     */
    protected $resetView = 'frontend.auth.passwords.reset';
}
