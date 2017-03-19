<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class BizProfilePhoto extends Model {
	protected $table = 'biz_profile_photos';

	protected $fillable = ['image','biz_id'];

	public static $rules = array(
	'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'
	);

    public function biz()
    {
        return $this->belongsTo('App\Biz','biz_id');
    }
}