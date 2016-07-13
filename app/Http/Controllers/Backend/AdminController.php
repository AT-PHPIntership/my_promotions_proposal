<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Repositories\AdminRepository as Admin;
use App\Http\Requests\Backend\AdminRequest;
use App\Http\Controllers\Controller;
use File;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\Backend\AdminRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(config('app.upload')), $data['image']);
        }

        $data['password'] = bcrypt($data['password']);

        $result = $this->admin->create($data);

        if (!$result) {
            flash(trans('messages.error_create_admin'), 'danger');
        } else {
            flash(trans('messages.create_admin_successfull'), 'success');
        }

        return redirect()->route('admin.admins.index');
    }
}
