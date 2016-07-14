<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AdminRequest;
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
      return view('backend.admin.index')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id request update
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['admin'] = $this->admin->find($id, ['id', 'name', 'email', 'phone', 'address', 'image']);
      return view('backend.admin.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id admin users
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        
    }
}
