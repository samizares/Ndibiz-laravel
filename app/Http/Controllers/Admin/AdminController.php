<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CatCreateRequest;
use App\Http\Requests\CatUpdateRequest;
use App\Http\Requests\BusinessRegRequest;

use App\Http\Controllers\Controller;

use App\Cat;
use App\SubCat;

use App\Biz;
use App\State;
use App\Address;
use App\Biz_Subcat_pivot;
use App\Setting;

class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $cats = Cat::all();
       $bizs = Biz::all();
       $states = State::all();
       $set= Setting::findOrFail(1);

    return view('admin.index', compact('biz', 'states', 'featured','set'))->withCats($cats);
    }

    public function settings(Request $request)
    {  

      //dd($request->all());
       
        $data = [
           'image' => $request->file('image'),
           'title1'=> $request->get('title1'),
           'subtitle' => $request->get('subtitle'),
        ];

        $rules = [
             'image'=> 'image|mimes:jpeg,jpg,png,gif',
             'title1'=> 'required|min:3',
             'subtitle'=> 'required| min:10',

        ];

        $validator = \Validator::make($data, $rules);
        if ($validator->passes())
         {
             $settings_id= $request->get('id');
             $settings= Setting::findOrFail($settings_id);
             $settings->title1=   $request->get('title1');
             $settings->span1 =   $request->get('span1');
             $settings->span2 =   $request->get('span2');
             $settings->span3 =   $request->get('span3');
             $settings->span4 =   $request->get('span4');
             $settings->span5 =   $request->get('span5');
             $settings->title2=   $request->get('title2');

             if($image= $request->file('image'))
             {
            $name= time(). $image->getClientOriginalName();
            $image->move('Settings/bckImg', $name);
            $settings->image ='Settings/bckImg/'.$name;
             }
            $settings->save();

             return \Redirect::back()
            ->with('success', 'Home Page Settings updated!!!');         
         }
         return \Redirect::back()
        ->with('errors', $validator->messages());
    }

   
}
