<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_User_pivot extends Model
{
    protected $table = 'cat_user_pivot';
    public $timestamps = false;

   protected $fillable = ['cat_id', 'user_id'];
}
