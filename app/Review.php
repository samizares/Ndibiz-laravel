<?php

namespace App;

use App\Biz;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function  biz()
    {
    	return $this->belongsTo('Biz');
    }

    public function scopeApproved($query)
    {
    	return $query->where('approved', true);
    }

    public function scopeSpam($query)
    {
    	return $query->where('spam',true);
    }

    public function scopeNotSpam($query)
    {
    	return $query->where('spam', false);
    }

    public function getTimeagoAttribute()
	{
 		 $date = \CarbonCarbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
  		return $date;
	}

	 public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:10',
            'rating'=>'required|integer|between:1,5'
        );
    }

	public function storeReviewForBix($bizID, $comment, $rating)
	{
 		 $biz = Biz::find($bizID);

  		$this->user_id = \Auth::user()->id;

  		$this->comment = $comment;
 		 $this->rating = $rating;
  		$biz->reviews()->save($this);

  		// recalculate ratings for the specified product
  		$biz->recalculateRating();
	}
}

