<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{ 
	protected $table= 'cats';
	public $timestamps = false;
	protected $fillable = ['name', 'meta_description','image_class'];
    //


public function biz()
{
  return $this->belongsToMany('App\Biz','biz_cat_pivot','cat_id','biz_id');
}

public function subcats()
{
  return $this->hasMany('App\SubCat','cat_id');
}


}