<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biz_User_pivot extends Model
{
    protected $table = 'biz_user_pivot';
    public $timestamps = false;

   protected $fillable = ['biz_id', 'user_id'];
}
