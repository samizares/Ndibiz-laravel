<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
	public function category()
	{
     // Retrieve user's input ('q' query parameter)
       $query = \Input::get('q','');

       if(trim(urldecode($query))=='')
          return \Response::json(['data'=> []], 200);

        
      $cats = \App\Cat::where('name','like','%'.$query.'%')
    	->orderBy('name','asc')
    	->take(10)
    	->get(['id','name','image_class'])->toArray();

    $subcats = \App\SubCat::where('name','like','%'.$query.'%')
   		 ->orderBy('name','asc')
   		 ->take(10)
   		 ->get(['id','name'])->toArray();

    $data = array_merge($cats, $subcats);

        // Return JSON-encoded list of items inside of "data" object as a response to the request
        return \Response::json(['data' => $data]);

    }

    public function company()
    {
    	$query= \Input::get('m','');
    	if(trim(urldecode($query))=='')
          return \Response::json(['data'=> []], 200);

     	 $data= \App\Biz::where('name','like','%'.$query.'%')
      ->orderBy('name', 'asc')
      ->take(10)
      ->get(['id','name'])->toArray();
        
       return \Response::json(['data'=>$data]);

    }

    public function location()
    {
    	$query=\Input::get('l', '');
    	 if(trim(urldecode($query))=='')
          return \Response::json(['data'=> []], 200);

       $data=\App\State::where('name','like', '%'.$query.'%')
       ->orderBy('name', 'asc')
       ->take(10)
       ->get(['id','name'])->toArray();
        return \Response::json(['data'=>$data]);

    }

    public function lga() {

    	$query=\Input::get('z');

    	$list=\App\Lga::where('state_id', '=', $query)
    	->lists('name','id')->all();
      if(count($list) > 0) {
    	    foreach( $list as $key => $value) {
           $data[]=array('id' => $key, 'text'=>$value);
        }
      } else {
        $data[]= array('id'=>'0','text'=>'No areas/region found');
      }
    
    	return \Response::json(['data'=>$data]);

    }

    public function subcat() {

      $query=\Input::get('y');

      $list=\App\SubCat::where('cat_id', '=', $query)
      ->lists('name','id')->all();
      if(count($list) > 0) {
          foreach( $list as $key => $value) {
           $data[]=array('id' => $key, 'text'=>$value);
        }
      } else {
        $data[]= array('id'=>'0','text'=>'No subcategories found');
      }
    
      return \Response::json(['data'=>$data]);

    }



    public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;		
	}


}
