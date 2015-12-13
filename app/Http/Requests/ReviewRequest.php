<?php
namespace App\Http\Requests;

class ReviewRequest extends Request
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
            'comment'=>'required|min:5',
            'rating'=>'required|integer|between:1,5'
    ];
  }
}