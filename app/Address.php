<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table= 'address';
	public $timestamps = false;
	protected $fillable = ['street', 'region','state_id','biz_id','email','phone1','phone2'];

	public function biz()
    {
      return $this->belongsTo('App\Biz','biz_id');
    }

    public function state()
	{
		return $this->belongsTo('App\State', 'state_id');
	}

	public function lga(){
 		return $this->belongsTo('App\Lga','lga_id');
 	}

}
