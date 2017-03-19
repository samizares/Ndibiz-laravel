<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BusinessRegRequest;
use App\Http\Controllers\Controller;
use App\Biz;
use App\Lga;
use App\State;
use App\Address;
use App\BizProfilePhoto;
use App\SubCat;
use App\Cat;
use App\BusinessHour;
use App\Report;
use App\Events\BizWasAdded;

class BizController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth',['except'=>'index','show']);
        $this->middleware('confirm',['except'=>'index','show']);
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
         $stateList= State::lists('name','id');
         $catList   = Cat::lists('name','id');
         $featured= Biz::whereFeatured('YES')->get();
        // dd($catList);

        return view('pages.regbiz', compact('stateList', 'catList','featured'));
        
    }

    public function reportBiz(Request $request) {
        //dd($request->all());
        $report= new Report();
        $report->complaint= $request->get('complaint');
        $report->explain= $request->get('explain');
        $report->biz_id=  $request->get('id');
        $report->contact_email=$request->get('email');
        $report->user_id= \Auth::id();
        $report->save();
        return \Redirect::back()
        ->with('success_code', 220)
        ->with('report', 'Thanks your report will be processed shortly');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BusinessRegRequest $request)
    {
        $data=$request->all();
        $biz=$this->saveBiz($data);
         event(new BizWasAdded($biz->id));

         return redirect()->route('bizprofile',['slug'=>$biz->slug,'id'=>$biz->id])->withSuccess('A new business has been added.');
       
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
        dd($request->all());
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function saveBiz(Array $request)
    {
        $biz = new Biz();
        $bizname=            strtolower($request['name']);
        $biz->name =         $bizname;
        $biz->tagline=       $request['tagline'];
        $biz->description=   $request['description'];
        $biz->contactname=   $request['contactname'];
        $biz->website=       $request['website'];
      
        $user= \Auth::user();
        $biz->user_id= $user->id;
        $biz->save();
       if($biz->name === $bizname)
        {
            $oldBiz=Biz::where('name',$bizname)->first();

            if($oldBiz->profilePhoto != null)
            {
                $newPic=new BizprofilePhoto();
                $newPic->image=$oldBiz->profilePhoto->image;
                $newPic->save();
                $biz->profilePhoto()->save($newPic);
            }
            
        } 

        if(isset($request['image']))
        {
            $pic=new BizProfilePhoto();
            $image= $request['image'];
            $name= time().$image->getClientOriginalName();
            $desPath = public_path('bizz/profile/');
            $upload_success =$image->move($desPath, $name);
            $pic->image='bizz/profile/'.$name;
            $pic->biz_id=$biz->id;
            $pic->save();
        }


        
        
        //Change biz to cliamed and status to pending if a Non-admin registered the business
        //because the business needs to be verified even though it has been claimed already.
        if( $user->admin !=1)
        {
        $biz2= Biz::where('id', $biz->id)->first();
            $biz2->claimed=1;
            $biz2->status="pending";
            $biz2->owner =$user->id;
        $biz2->save();
        }

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

        //store the adress in the address table and link to the specific business
        $add= new Address();
        $add->street= $request['address'];
        $add->email=  $request['email'];
        $add->phone1= $request['phone1'];
        $add->phone2= $request['phone2'];    
        $add->state_id=$request['state'];
        $add->lga_id= $newArea->id;

        //Check if a bank is added
        if( isset($request['sort_code']))
        {
            $add->sortcode=$request['sort_code'];
        }
        $add->biz_id= $biz->id;
        $add->save();

         //add the lists of categories and subcategories and link to biz
        $category=$request['cats'];       
        $biz->cats()->sync($category);
        $subs= $request['sub'];
        $biz->subcats()->sync($subs);

        //LINK THE BUSINESS TO THE LGA/REGION
        $biz->lgas()->attach($newArea->id);

        $state=$request['state'];
        $biz->states()->attach($state);
        
           $biz->save();
           return $biz;
        
        
    
    }
}
