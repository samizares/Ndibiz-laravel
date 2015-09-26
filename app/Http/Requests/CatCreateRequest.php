<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CatCreateRequest extends Request
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
      /*  return [
      'category_name' => 'required|unique:cats,name',
      'subcat_name'=> 'unique:sub_cats,name',
      ];   */

          $rules = [
          'category_name' => 'required| min:3|max:40| unique:cats,name',
            ];

         foreach($this->request->get('subcategory_name') as $key => $val)
        {
            $rules['subcategory_name.'.$key] = 'unique:sub_cats,name|min:3|max:40';
         }

        return $rules;
     }

     public function messages()
    {
        $messages = [];
          foreach($this->request->get('subcategory_name') as $key => $val)
              {
                 $messages['subcategory_name.'.$key.'.min'] = 
                 'The Subcategory "'.$val.'" must not be less than :min characters.';

                 $messages['subcategory_name.'.$key.'.unique'] = 
                 'The Subcategory "'.$val.'" already exist in the database';
                }
                return $messages;
    }
}
