<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table= 'photo_user';
	protected $fillable = ['path'];

  public function user()
  {
  	return $this->belongsTo('App\User');
  }

}