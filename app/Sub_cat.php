<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_cat extends Model
{
    protected $table= 'sub_cats';
	public $timestamps = false;
	protected $fillable = ['name','cats_id'];

public function cat()
{
  return $this->belongsTo('App\Cat','cats_id');
}

}
