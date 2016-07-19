<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class RegisterUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Update
        if ($this->user) {
            return [
                'name'     => 'required|min:3',
                'email'    => 'required|email|unique:users,email,' . $this->user,
                'password' => 'min:6',
                'phone'    => 'numeric|min:9',
                'image'    => 'image',
            ];
        }

        // Insert
        return [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone'    => 'numeric|min:9',
            'image'    => 'required|image',
        ];
    }
}
