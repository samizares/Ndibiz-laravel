<?php

namespace App\Listeners;

use App\Events\BizWasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Biz;

class BizWasDeletedlistener
{
    protected $biz_id;
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
        $this->biz_id=$event->biz_id;
        $biz=Biz::where('id',$this->biz_id)->first();
        //find array of categories ID linking this business
        $cat= $biz->cats->lists('id')->all();
        //find array of subcategories ID linking this business
        $sub= $biz->subcats->lists('id')->all();
        //Find the LGA/Region ID  of the buiness
        $area_id=$biz->address->lga_id;
        //find the state ID of the business
        $state_id=$biz->address->state_id;
        //find all the photos for the biz
        $photos=$biz->photos();
        //Detach the categories from biz,that is deleting their pivot table link
        $biz->cats()->detach($cat);
        //Detach the area/region ID from the biz.
        $biz->lgas()->detach($area_id);
        //Detach the stateID from the business
        $biz->states()->detach($state_id);
        //Detach the subcategories from the biz
        $biz->subcats()->detach($sub);
        //Delete the address of the biz from the address table
        $biz->address()->delete();
        //Delete all photos associated with photos
        if(isset($biz->photos))
        {
             $biz->photos()->delete();
        }
        //Delete the profile picture associated with the biz
        if(isset($biz->profilePhoto))
        {
            $biz->profilePhoto()->delete();
        }
        $biz->delete();
    }
}
