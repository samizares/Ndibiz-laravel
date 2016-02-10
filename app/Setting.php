<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table= 'settings';
	protected $fillable = ['title','title2','span1','span2','span3','span4','span5','subtitle'];

}