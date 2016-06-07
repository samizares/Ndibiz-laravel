<?php

namespace App\Listeners;

use App\Events\BizWasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BizWasDeletedlistener
{
    protected $biz;
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
     * @param  BizWasDeleted  $event
     * @return void
     */
    public function handle(BizWasDeleted $event)
    {
        $this->biz=$event->biz;
        //find array of categories ID linking this business
        $cat= $this->biz->cats->lists('id')->all();
        //find array of subcategories ID linking this business
        $sub= $this->biz->subcats->lists('id')->all();
        //Find the LGA/Region ID  of the buiness
        $area_id=$this->biz->address->lga_id;
        //find the state ID of the business
        $state_id=$this->biz->address->state_id;
        //find all the photos for the biz
        $photos=$this->biz->photos();
        //Detach the categories from biz,that is deleting their pivot table link
        $this->biz->cats()->detach($cat);
        //Detach the area/region ID from the biz.
        $this->biz->lgas()->detach($area_id);
        //Detach the stateID from the business
        $this->biz->states()->detach($state_id);
        //Detach the subcategories from the biz
        $this->biz->subcats()->detach($sub);
        //Delete the address of the biz from the address table
        $this->biz->address()->delete();
        //Delete all photos associated with photos
        if(isset($this->photos))
        {
             $this->biz->photos()->delete();
        }
        //Delete the profile picture associated with the biz
        if(isset($this->biz->profilePhoto))
        {
            $this->biz->profilePhoto()->delete();
        }
        $this->biz->delete();

    return redirect('/admin/biz')
        ->withSuccess("The business has been deleted.");
    }
}
