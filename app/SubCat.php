<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    protected $table= 'sub_cats';
	public $timestamps = false;
	protected $fillable = ['name','cat_id'];

public function cat()
{
  return $this->belongsTo('App\Cat','cat_id');
}

public function biz()
{
  return $this->belongsToMany('App\Biz','biz_subcat_pivot','subcat_id', 'biz_id');
}

}
