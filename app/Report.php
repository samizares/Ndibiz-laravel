<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table= 'reports';
	protected $fillable = ['reasons','explain','user_id','biz_id'];

}