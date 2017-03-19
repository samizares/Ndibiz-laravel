<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table= 'owners';
	protected $fillable = ['fullname','email','proof','ownership','status','user_id','biz_id'];

}