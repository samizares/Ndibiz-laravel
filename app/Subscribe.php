<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table= 'public_subscribe';
	protected $fillable = ['email'];

}