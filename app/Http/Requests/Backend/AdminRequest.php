<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class AdminRequest extends Request
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
        if ($this->admins) {
            return [
                'name'     => 'required|min:3',
                'email'    => 'required|email|unique:admin_users,email,' . $this->admins,
                'password' => 'min:6',
                'phone'    => 'numeric|min:9',
                'image'    => 'image',
            ];
        }

        // Insert
        return [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:admin_users,email',
            'password' => 'required|min:6',
            'phone'    => 'numeric|min:9',
            'image'    => 'required|image',
        ];
    }
}
