<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    
    protected $table= 'lgas';
	public $timestamps = false;
	protected $fillable = ['name','area','state_id'];


	public function state(){
		return $this->belongsTo('App\State');
	}
	
	 public function areas(){
 		return $this->hasMany('App\Address');
 	}

}