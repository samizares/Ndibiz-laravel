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
use App\BusinessHour;
use App\Events\BizWasDeleted;
use App\BizProfilePhoto;
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
        dd($request->all());
        $biz = new Biz();
        $biz->name =         $request->input('name');
        $biz->contactname=   $request->input('contactname');
        $biz->email=         $request->input('email');
        $biz->website=       $request->input('website');
        $biz->phone1=        $request->input('phone1');
        $biz->phone2=        $request->input('phone2');
        $biz->user_id=       \Auth::id();
        $biz->save();

        $area=$request->get('lga');
        if($existingArea=Lga::where('name',$area)->first())
        {
            $newArea=$existingArea;
        }
        else{
            $newArea=new Lga();
            $newArea->name=$area;
            $newArea->save();
        }

        $add= new Address();
        $add->street= $request->input('address');
        $add->lga_id= $newArea->id;
        $add->state_id=$request->input('state');
        $add->biz_id= $biz->id;
        $add->save();

        $category=$request->input('cats');
       
        $biz->cats()->sync($category);

        $subs= $request->input('sub');
        $biz->subcats()->sync($subs);

        //$lga=$request->input('lga');
        $biz->lgas()->attach($newArea->id);

        $state=$request->input('state');
        $biz->states()->attach($state);

        //$mon = BusinessHour::create(['day' => 'MON','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);
       // $tue = BusinessHour::create(['day' => 'TUE','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);
       // $wed = BusinessHour::create(['day' => 'WED','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);
       // $thu = BusinessHour::create(['day' => 'THU','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);
       // $fri = BusinessHour::create(['day' => 'FRI','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);
       // $sat = BusinessHour::create(['day' => 'SAT','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);
       // $sun = BusinessHour::create(['day' => 'SUN','open_time'=>9,'close_time'=>5,'biz_id'=>$biz->id]);

       
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
        $lgaList= Lga::lists('name','name');
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
       // dd($request->all());

        $biz= Biz::findorFail($id);
        $bizName =  strtolower($request->get('name'));
        $biz->name = $bizName;
      // dd(Biz::where('name',$bizName)->get());
        $biz->contactname=   $request->get('contactname');
        $biz->website=       $request->get('website');
        $biz->tagline=       $request->get('tagline');
        $biz->description=   $request->get('description');
        $biz->save();

        //store user added or system generated local government area/or region 
        $area=$request['lga'];
        if($existingArea=Lga::where('name',$area)->first())
        {
            $newArea=$existingArea;
        }
        else{
            $newArea=new Lga();
            $newArea->name=$area;
            $newArea->state_id=$request['state'];
            $newArea->save();
        }


        $add= Address::where('biz_id', $biz->id)->first();
        $add->street= $request->get('address');
        $add->lga_id= $newArea->id;
        $add->state_id=$request->get('state');
        $add->email=  $request->get('email');
        $add->phone1= $request->get('phone1');
        $add->phone2= $request->get('phone2'); 
        $add->save();

        //store the link between biz and lga/region
        $biz->lgas()->attach($newArea->id);
        
        $state=$request->get('state');
        $biz->states()->attach($state);

        $category=$request->get('cats');
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
        $biz->subcats()->sync($subs);

        if($request->hasfile('image'))
        {
            $pic=new BizProfilePhoto();
            $image= $request->file('image');
            $name= time().$image->getClientOriginalName();
            $desPath = public_path('bizz/profile/');
            $upload_success =$image->move($desPath, $name);
            $picName='bizz/profile/'.$name;
            $pic->image=$picName;
           // $pic->save();

            $allBiz= Biz::where('name',$bizName)->get();
            foreach($allBiz as $oneBiz){
                if($oneBiz->profilePhoto == null){
                    $oneBiz->profilePhoto()->save($pic);
                }
                else{
                    $oldPic = $oneBiz->profilePhoto->image;
                    $profilePic=BizProfilePhoto::where('image',$oldPic)->first();
                    $profilePic->image =$picName;
                    $profilePic->save();

                }
            }
        }
 

        return redirect("/admin/biz/")
        ->withSuccess("Changes Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        //find the business
        $biz = Biz::findOrFail($id);
        //Find all the categories linking this biz
        $cat= $biz->cats->lists('id')->all();
        //Find all the subcategories linking this business
        $sub= $biz->subcats->lists('id')->all();
        //Find the Lga/region of the business
        $lga=$biz->address->lga_id;
        //Find the state ID of the business
        $state_id=$biz->address->state_id;

        $biz->cats()->detach($cat);
        $biz->subcats()->detach($sub);
        $biz->address()->delete();
        $biz->delete();

    return redirect('/admin/biz')
        ->withSuccess("The business '$biz->name' has been deleted.");
    }

     public function deleteBiz(Request $request)
    {
       // get the ID of the business
        $biz_id =$request->get('yes');
        //find the business, so we can clean up the database
       // $biz= Biz::findorFail($bizId);
        \Event::fire(new BizWasDeleted($biz_id));
        return redirect('/admin/biz')
        ->withSuccess("The business has been deleted.");

        
    }
}
