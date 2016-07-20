<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;
use File;

class UserController extends Controller
{
	/**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Function construct of UserController
     *
     * @param UserRepository $user user
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id request update
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile($id)
    {
    	$data['user'] = $this->user->find($id);

    	if (empty($data['user'])) {
    		flash(trans('messages.error_not_found'), 'danger');
            return back();
    	}
    	return view('frontend.user.profile')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id users
     *
     * @return \Illuminate\Http\Response
     */
    public function postProfile(UserRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        $user = $this->user->find($id, ['image']);

        if ($request->hasFile('image')) {
            if ($user->image) {
                file::delete(config('upload.user_path') . $user->image);
            }
            $img = $request->file('image');
            $data['image'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.user_path')), $data['image']);
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = array_except($data, ['password']);
        }
      
        $result = $this->user->update($data, $id);

        if (!$result) {
            flash(trans('messages.error_update_profile'), 'danger');
        } else {
            flash(trans('messages.update_profile_successfull'), 'success');
        }
        
        return redirect()->route('index');
    }
}
