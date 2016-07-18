<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CountyRequest extends Request
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
        if ($this->county) {
            return [
                'name' => 'required|unique:counties,name,' . $this->county,
                'city_id' => 'required'
            ];
        }

        // Insert
        return [
            'name' => 'required|unique:counties,name',
            'city_id' => 'required'
        ];
    }
}
