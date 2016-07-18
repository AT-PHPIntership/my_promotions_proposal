<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
        if ($this->category) {
            return [
                'name' => 'required|min:3|unique:categories,name,'.$this->category
            ];
        }

        return [
            'name' => 'required|min:3|unique:categories,name'
        ];
    }
}
