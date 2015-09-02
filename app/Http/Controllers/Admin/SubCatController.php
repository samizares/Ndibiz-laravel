<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
	public function deleteSub()
  {
  	    if ( $request->ajax() ) {
  		$sub_id=\Input::get('d');
  		$sub=\App\SubCat::whereId($sub_id)->first();
  		$sub->delete();
  		return redirect()->back();

	  		}

     	 response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
       
  }

}