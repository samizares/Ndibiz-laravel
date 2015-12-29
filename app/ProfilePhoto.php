<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ProfilePhoto extends Model {
	protected $table = 'profile_photos';

	protected $fillable = ['image'];

	public static $rules = array(
	'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'
	);

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}