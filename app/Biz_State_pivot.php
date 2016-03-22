<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biz_State_pivot extends Model
{
    protected $table = 'biz_state_pivot';
    public $timestamps = false;

   protected $fillable = ['state_id', 'biz_id'];
}
