<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    protected $table= 'business_hours';
	protected $fillable = ['day','open_time','close_time','biz_id'];

public function biz()
	{
 	 return $this->belongsTo('App\Biz','biz_id');
	}


}
