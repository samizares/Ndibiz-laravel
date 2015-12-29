<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BizPhoto extends Model
{
    protected $table= 'biz_photos';
	protected $fillable = ['path'];

  public function biz()
  {
  	return $this->belongsTo('App\Biz');
  }

}