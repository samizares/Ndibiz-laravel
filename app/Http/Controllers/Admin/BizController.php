<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\BusinessRegRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Biz;
use App\Lga;
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
        $totalBiz=Biz::count();
      //  dd($totalBiz);
     //  foreach( $bizs as $biz)             
     
       return view('admin.biz.index', compact('bizs','totalBiz'));
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
        $sub= $biz->subcats->lists('id')->all();
       // dd($sub);
        $catList= Cat::lists('name', 'id');
        $subList= SubCat::lists('name','id');
       // dd($subList);
        $stateList= State::lists('name','id');
        $lgaList= Lga::lists('name','id');
        //$area= Address::lists

        //dd($biz->address->state->name);
            
          //  foreach ($biz->subcats as $sub) {
          //      $currentSubs[] = $sub->id;
          //  }
 
          //   if(empty($currentSubs)){
          //      $currentSubs = '';
          //  }

        return view('admin/biz/edit',compact('biz','catList','subList','stateList','cat','currentSubs','lgaList','sub'));
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
       // $catNames= [];
        // $biz->cats()->delete();
        /*  foreach ($category as $cat) {
            if( $existingCat = Cat::where('name', $cat)->first()) {
                 $catNames[]= $existingCat;
                }
                 else{
                     $newCat = new Cat();
                     $newCat ->name  = $cat;
                     $newCat->save();
                 $catNames[]=$newCat;
                 }
            }  
                $biz->cats()->saveMany($catNames); */
       
        $biz->cats()->sync($category);

        $subs= $request->input('sub');
        // $real= [];

        // $biz->subcats()->delete();
         /* foreach ($subs as $sub) {
            if( $existingSub = SubCat::where('name', $sub)->first()) {
                 $real[]= $existingSub;
                }
                 else{
                     $newSub = new SubCat();
                     $newSub ->name  = $sub;
                     $newCat->save();
                 $real[]=$newSub;
                 }
            }
                $biz->subcats()->saveMany($real);  */
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
        $biz = Biz::findOrFail($id);
        $cat= $biz->cats->lists('id')->all();
       // dd($cat);
        $sub= $biz->subcats->lists('id')->all();
        $biz->cats()->detach($cat);
        $biz->subcats()->detach($sub);
        $biz->address()->delete();
        $biz->delete();

    return redirect('/admin/biz')
        ->withSuccess("The business '$biz->name' has been deleted.");
    }
}
