<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biz extends Model
{
   protected $table = 'biz';

   protected $fillable = ['name', 'adress', 'contactname', 'email','website', 'phone1', 'phone2'];


   public function ownerbiz()
    {
        return $this->BelongsTo('App\User');
    }

    public function cats()
    {
        return $this->belongsToMany('App\Cat', 'biz_cat_pivot', 'cat_id','biz_id');
    }

    public function state()
    {
      return $this->belongsTo('App\State','state_id');
    }
}
