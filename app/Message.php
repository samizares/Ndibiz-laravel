<?php

namespace App;

use App\Biz;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
     protected $fillable = ['name', 'email', 'website', 'comment', 'user_id'];
     
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


}

