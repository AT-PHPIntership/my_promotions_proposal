<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository as Admin;

class AdminController extends Controller
{
    /**
      * Admin
      *
      * @var admin
      */
    private $admin;

     /**
      * Function construct of AdminController
      *
      * @param AdminRepository $admin admin
      *
      * @return void
      */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admins'] = $this->admin->all(['id', 'name', 'email', 'phone', 'address']);
        return view('admin::index')->with($data);
    }
}
