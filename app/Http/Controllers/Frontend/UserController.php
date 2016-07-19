<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\RegisterUserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;

class UserController extends Controller
{
    /**
    * User
    *
    * @var User
    */
    private $user;

    /**
    * Construct a UserController
    *
    * @param int $user user
    */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display form register.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('frontend.user.register');
    }

    /**
     * Store a newly created user.
     *
     * @param \Illuminate\Http\Requests\Frontend\RegisterUserRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister(RegisterUserRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $data['image'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.path_frontend')), $data['image']);
        }
        $data['password'] = bcrypt($data['password']);

        $result = $this->user->create($data);

        if (!$result) {
            flash(trans('messages.error_create_user'), 'danger');
        } else {
            flash(trans('messages.create_user_successfull'), 'success');
        }
        return redirect()->route('login');
    }
}
