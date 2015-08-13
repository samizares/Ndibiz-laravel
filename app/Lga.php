<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    
    protected $table= 'lga';
	public $timestamps = false;
	protected $fillable = ['name','area','state_id'];


public function state(){
	return $this->belongsTo('App\State');
}


}