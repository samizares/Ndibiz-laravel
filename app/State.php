<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table= 'states';
	public $timestamps = false;
	protected $fillable = ['name'];

	public function lgas(){
		return $this->hasMany('App\Lga');
	}

	public function biz()
	{
		return $this->hasMany('App\Biz');
	}
}
