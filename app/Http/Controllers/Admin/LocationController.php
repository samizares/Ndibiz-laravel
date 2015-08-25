<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Biz;
use App\State;
use App\Address;
use App\Lga;
use App\Cat;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $states= State::all();
     // foreach ($states as $state)          
     //  dd($state->name);
       return view('admin.location.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
          $stateList= State::lists('name','id');
          $lgaList   = lga::lists('name','id');

        return view('admin.location.create', compact('stateList', 'lgaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LocationCreateRequest $request)
    {     
        $state_id= $request->input('state');
       // $state= State::where('id', $state_id)->first();
        $locs= $request->input('lga');

        foreach ($locs as $loc) {

            $area = new Lga();
            $area ->name = $loc;
            $area ->state_id = $state_id; 
            $area->save();
         }
                    
       
        return redirect('/admin/location/create')
         ->withSuccess("Area created.");
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
        $add->region= $request->input('lga');
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
