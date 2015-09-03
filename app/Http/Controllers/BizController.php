<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BusinessRegRequest;
use App\Http\Controllers\Controller;
use App\Biz;
use App\State;
use App\Cat;

class BizController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth',['except'=>'index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       // return view('pages.regbiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $stateList= State::lists('name','name');
         $catList   = Cat::lists('name','id');
         $featured= Biz::whereFeatured('YES')->get();

        return view('pages.regbiz', compact('stateList', 'catList','featured'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BusinessRegRequest $request)
    {
        $biz = new Biz();
        $biz->name =$request->name;
        $biz->address = $request->address;
        $biz->address2= $request->address2;
        $biz->contactname= $request->contactname;
        $biz->email= $request->email;
        $biz->website= $request->website;
        $biz->phone1= $request->phone1;
        $biz->phone2= $request->phone2;
        $biz->user_id= \Auth::id();
        $biz->state_id=$request->state;
        $biz->cat_id= $request->product;
        $biz->save();

        return redirect('/admin/biz')
         ->withSuccess("The business '$biz->name' has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
