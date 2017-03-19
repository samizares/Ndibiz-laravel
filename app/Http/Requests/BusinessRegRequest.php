<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BusinessRegRequest extends Request
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
        return [
            'name'         => 'required|min:3',
            'address'      => 'required | min:8',
            //'contactname'  => 'required|min:3',
            //'email'        => 'required | email',
           // 'phone1'       => 'required|min:6',
           // 'phone2'       => '|min:6',
            'cats'         => 'required',
            'sub'          => 'required',
           // 'website'      => 'url',
            'state'        => 'required',
            'image'=>       'image|mimes:jpeg,jpg,bmp,png,gif',
            'lga'          => 'required',

     ];
    }
}
