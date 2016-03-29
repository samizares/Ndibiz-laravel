<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table= 'branch';

	protected $fillable = ['street', 'state_id','lga_id','biz_id','email','phone1','phone2','sortcode'];

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
