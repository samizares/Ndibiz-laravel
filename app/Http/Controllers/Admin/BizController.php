<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\BusinessRegRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Biz;
use App\State;
use App\Address;
use App\SubCat;
use App\Biz_Subcat_pivot;
use App\Cat;

class BizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bizs= Biz::all();
     //  foreach( $bizs as $biz)             
     
       return view('admin.biz.index', compact('bizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
          $stateList= State::lists('name','id');
          $catList   = Cat::lists('name','id');

        return view('admin.biz.create', compact('stateList', 'catList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BusinessRegRequest $request)
    {
       // dd($request->input('sub'));
        $biz = new Biz();
        $biz->name =         $request->input('name');
        $biz->contactname=   $request->input('contactname');
        $biz->email=         $request->input('email');
        $biz->website=       $request->input('website');
        $biz->phone1=        $request->input('phone1');
        $biz->phone2=        $request->input('phone2');
        $biz->user_id=       \Auth::id();
        $biz->save();

        $add= new Address();
        $add->street= $request->input('address');
        $add->lga_id= $request->input('lga');
        $add->state_id=$request->input('state');
        $add->biz_id= $biz->id;
        $add->save();

        $category=$request->input('cats');
       
        $biz->cats()->sync($category);

        $subs= $request->input('sub');
        $biz->subcats()->sync($subs);
       
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
        $biz= Biz::findorFail($id);
        $cat= $biz->cats->lists('id')->all();
        $catList= Cat::lists('name', 'id');
        $subList= SubCat::lists('name','id');
        $stateList= State::lists('name','id');
        //$area= Address::lists

        //dd($biz->address->state->name);
            
            foreach ($biz->subcats as $sub) {
                $currentSubs[] = $sub->id;
            }
 
             if(empty($currentSubs)){
                $currentSubs = '';
            }

        return view('admin/biz/edit',compact('biz','catList','subList','stateList','cat','currentSubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BusinessRegRequest $request, $id)
    {
        $biz= Biz::findorFail($id);
        $biz->name =         $request->input('name');
        $biz->contactname=   $request->input('contactname');
        $biz->email=         $request->input('email');
        $biz->website=       $request->input('website');
        $biz->phone1=        $request->input('phone1');
        $biz->phone2=        $request->input('phone2');
        $biz->user_id=       \Auth::id();
        $biz->save();

        $add= Address::where('biz_id', $biz->id)->first();
        $add->street= $request->input('address');
        $add->lga_id= $request->input('lga');
        $add->state_id=$request->input('state');
        $add->save();

        $category=$request->input('cats');
       
        $biz->cats()->sync($category);

        $subs= $request->input('sub');
        $biz->subcats()->sync($subs);

        return redirect("/admin/biz/")
        ->withSuccess("Changes Updated");
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
