<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
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
        $totalState=State::count();          
     //  dd($state->name);
       return view('admin.location.index', compact('states','totalState'));
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
         $state= $request->input('state');
         if(! $existingState= State::where('id', $state)->first()) {
                 
                     $newState= new State();
                     $newState->name=$state;
                     $newState->save();
            }
       
        $locs= $request->input('lga');

        foreach ($locs as $loc) {

            $area = new Lga();
            $area ->name = $loc;
            $area ->state_id = $newState->id; 
            $area->save();
         }
                    
       
        return redirect('/admin/location')
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
    {   $stateList= State::lists('name','name');
        $lgaList   = lga::lists('name','name');
        $state= State::findorFail($id);
        $areas= $state->lgas->lists('name')->all();

        return view('admin/location/edit',compact('state','areas','stateList','lgaList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(LocationUpdateRequest $request, $id)
    {
        $state = State::findOrFail($id);
        $state->name=$request->input('state');
        $state->save();

        $lgas= $request->input('lga');
         $real= [];

         $state->lgas()->delete();
          foreach ($lgas as $lga) {
            if( $existingArea = Lga::where('name', $lga)->first()) {
                 $real[]= $existingArea;
                }
                 else{
                     $newArea = new Lga();
                     $newArea ->name  = $lga;
                     $newArea->save();
                 $real[]=$newArea;
                 }
            }
                $state->lgas()->saveMany($real); 


    return redirect("/admin/location/")
        ->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->lgas()->delete();
        $state->delete();
        return redirect('/admin/location')
        ->withSuccess("The location '$state->name' has been deleted.");
    }
}
