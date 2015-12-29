<?php

namespace App;

use App\Biz;
//use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
     protected $fillable = ['biz_id', 'rating', 'comment', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function  biz()
    {
    	return $this->belongsTo('App\Biz');
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
 		// $date = \Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        $stt=strtotime($this->created_at);

        $date= $this->created_at->createFromTimeStamp($stt)->diffForHumans();
  		return $date;
	}

	 public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:5',
            'rating'=>'required|integer|between:1,5'
        );
    }

	public function storeReviewForBiz($bizID, $comment, $rating)
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

