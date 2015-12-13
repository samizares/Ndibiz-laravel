<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LocationCreateRequest extends Request
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

                $rules=[
                     'state' => 'required| unique:states,id',
                    ];
                 foreach($this->request->get('lga') as $key => $val)
                    {
                         $rules['lga.'.$key] = 'unique:lgas,id';
                    }
                return $rules;
         }

          public function messages()
    {
        $messages = [];
          foreach($this->request->get('lga') as $key => $val)
              {
                
                 $messages['lga.'.$key.'.unique'] = 
                 'The area already exist in the database';
                }
                return $messages;
    }
}
