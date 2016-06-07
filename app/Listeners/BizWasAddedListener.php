<?php

namespace App\Listeners;

use App\Events\BizWasAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Biz;
use App\Lga;
use App\State;
use App\Address;
use App\BizProfilePhoto;
use App\SubCat;
use App\Cat;

class BizWasAddedListener
{
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BizWasAdded  $event
     * @return void
     */
    public function handle(BizWasAdded $event)
    {
        $this->request=$event->request;
        //dd($this->request);
        $biz = new Biz();
        $biz->name =         $this->request['name'];
        $biz->tagline=       $this->request['tagline'];
        $biz->description=   $this->request['description'];
        $biz->contactname=   $this->request['contactname'];
        $biz->website=       $this->request['website'];
      
        $user= \Auth::user();
        $biz->user_id= $user->id;
        $biz->save();

        //Change biz to cliamed and status to pending if a Non-admin registered the business
        //because the business needs to be verified even though it has been claimed already.
        if(! isset($user->admin))
        {
        $biz2= Biz::where('id', $biz->id)->first();
            $biz2->claimed=1;
            $biz2->status="pending";
            $biz2->owner =$user->id;
        $biz2->save();
        }

        //store user added or system generated local government area/or region 
        $area=$this->request['lga'];
        if($existingArea=Lga::where('name',$area)->first())
        {
            $newArea=$existingArea;
        }
        else{
            $newArea=new Lga();
            $newArea->name=$area;
            $newArea->save();
        }

        //store the adress in the address table and link to the specific business
        $add= new Address();
        $add->street= $this->request['address'];
        $add->email=  $this->request['email'];
        $add->phone1= $this->request['phone1'];
        $add->phone2= $this->request['phone2'];    
        $add->state_id=$this->request['state'];
        $add->lga_id= $newArea->id;

        //Check if a bank is added
        if( isset($this->request['sort_code']))
        {
            $add->sortcode=$this->request['sort_code'];
        }
        $add->biz_id= $biz->id;
        $add->save();

         //add the lists of categories and subcategories and link to biz
        $category=$this->request['cats'];       
        $biz->cats()->sync($category);
        $subs= $this->request['sub'];
        $biz->subcats()->sync($subs);

        //LINK THE BUSINESS TO THE LGA/REGION
        $biz->lgas()->attach($newArea->id);

        $state=$this->request['state'];
        $biz->states()->attach($state);

        if(isset($this->request['image']))
        {
            $image= $this->request['image'];
            $name= time(). $image->getClientOriginalName();
            $image->move('bizz/profile', $name);
            $pic= new BizProfilePhoto;
            $pic->image ='bizz/profile/'.$name;
            $biz->profilePhoto()->save($pic);
        }
        
           // return redirect()->route('bizprofile',['slug'=>$biz->slug,'id'=>$biz->id])->withSuccess('A new business has been added.');

            \Session::flash('success','A new business has been added.');
            header('Location: '.url('biz/profile/slug/id',[$biz->slug,$biz->id]));
       
        
         
    }
}
