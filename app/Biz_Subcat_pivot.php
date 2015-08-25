<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biz_Subcat_pivot extends Model
{
    protected $table = 'biz_subcat_pivot';
    public $timestamps = false;

   protected $fillable = ['subcat_id', 'biz_id'];
}
