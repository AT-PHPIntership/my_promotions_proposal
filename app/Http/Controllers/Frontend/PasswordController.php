<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Auth\PasswordController as Password;

class PasswordController extends Password {

    protected $linkRequestView = 'frontend.layouts.password';
}