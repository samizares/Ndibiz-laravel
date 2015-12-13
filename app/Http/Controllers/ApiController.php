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

        
      $cats = \App\Cat::has('biz')->where('name','like','%'.$query.'%')
    	->orderBy('name','asc')
    	->take(10)
    	->get(['id','name','image_class'])->toArray();  

      $subcats = \App\SubCat::has('biz')->where('name','like','%'.$query.'%')
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

       $lga=\App\Lga::where('name','like', '%'.$query.'%')
       ->orderBy('name', 'asc')
       ->take(10)
       ->get(['id','name'])->toArray();

       $state= \App\State::where('name','like', '%'.$query.'%')
       ->orderBy('name', 'asc')
       ->take(5)
       ->get(['id','name'])->toArray();

        $data = array_merge($lga, $state);

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

       foreach($query as $q){
     // $catId=\App\Cat::whereId($q)->first();
     // $desc=$catId->meta_description
      $list=\App\SubCat::where('cat_id', '=', $q)
      ->lists('name','id')->all();
      if(count($list) > 0) {
          foreach( $list as $key => $value) {
           $data[]=array('id' => $key, 'text'=>$value);
        }
      } else {
        $data[]= array('id'=>'0','text'=>'No Subcategories found');
        }
      }    
    
      return \Response::json(['data'=>$data]);

    }

    public function subcat2() {

      $query=\Input::get('y');

      $catId=\App\Cat::whereId($query)->first();
      $desc=$catId->meta_description;

      $list=\App\SubCat::where('cat_id', '=', $query)
      ->lists('name','id')->all();
      if(count($list) > 0) {
          foreach( $list as $key => $value) {
           $data[]=array('id' => $key, 'text'=>$value);
        }
      } else {
        $data[]= array('id'=>'0','text'=>'No Subcategories found');
        }

      
    
      return \Response::json(['data'=>$data, 'desc'=>$desc]);

    }

    public function featured()
    {
      $biz_id=\Input::get('id');
      $newValue=\Input::get('data');

      $biz=\App\Biz::whereId($biz_id)->first();
      $biz->featured = $newValue;

     if($biz->save()) 
        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>'error','msg'=>'could not be updated'));
    }

     public function admin()
    {
      $user_id=\Input::get('id');
      $newValue=\Input::get('data');

      $user=\App\User::whereId($user_id)->first();
      $user->admin = $newValue;

     if($user->save()) 
        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>'error','msg'=>'could not be updated'));
    }

    public function opened()
    {
      $bh_id=\Input::get('id');
      $newValue=\Input::get('data');

      $bh=\App\BusinessHour::whereId($bh_id)->first();
      $bh->open_time = $newValue;

     if($bh->save()) 
        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>'error','msg'=>'could not be updated'));
    }

    public function closed()
    {
      $bh_id=\Input::get('id');
      $newValue=\Input::get('data');

      $bh=\App\BusinessHour::whereId($bh_id)->first();
      $bh->close_time = $newValue;

     if($bh->save()) 
        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>'error','msg'=>'could not be updated'));
    }

    public function searchCat()
    {
        $sub= \Input::get('sub');
        $loc= \Input::get('loc');
        $business= \DB::table('biz_subcat_pivot')->whereSubcat_id('query');
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
