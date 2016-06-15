<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biz extends Model
{
      protected $table = 'biz';

      protected $fillable = ['name', 'address','tagline','description', 'contactname', 'website'];

   public function address()
    {
      return $this->hasOne('App\Address','biz_id');
    }

    public function branch()
    {
      return $this->hasMany('App\Branch','biz_id');
    }

     public function reviews()
    {
      return $this->hasMany('App\Review');
    }
    
    public function hours()
    {
      return $this->hasMany('App\BusinessHour');
    }

    public function favoured()
    {
        return $this->belongsToMany('App\User','favourites','biz_id','user_id');
    }
   public function ownerbiz()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function subcats()
   {
       return $this->belongsToMany('App\SubCat','biz_subcat_pivot','biz_id', 'subcat_id');
    }

    public function subscribedUser()
    {
      return $this->belongsToMany('App\User', 'biz_user_pivot','biz_id','user_id');
    }

    public function setNameAttribute($value)
     {
       $this->attributes['name'] = $value;

      if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
         }
    }

   /*  protected function setUniqueSlug($name, $extra)
    {
        $slug = str_slug($name.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($name, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }
    */
    
    public function cats()
    {
        return $this->BelongsToMany('App\Cat', 'biz_cat_pivot','biz_id','cat_id');
    }

    
    public function states()
    {
       return $this->belongsToMany('App\State','biz_state_pivot','biz_id', 'state_id');
    }

    public function lgas()
    {
       return $this->belongsToMany('App\Lga','biz_lga_pivot','biz_id', 'lga_id');
    }

    public function profilePhoto()
    {
        return $this->hasOne('App\BizProfilePhoto','biz_id');
    }

    public function recalculateRating()
  {
      $reviews = $this->reviews()->notSpam()->approved();
      $avgRating = $reviews->avg('rating');
      $this->rating_cache = round($avgRating,1);
      $this->rating_count = $reviews->count();
      $this->save();
  }
  
  public function scopeByState($query, $stateID){
    return $query->whereHas('address', function($q) use ($stateID){
        $q->where('state_id', $stateID);
      });
    }

    public function scopeBySub($query, $subID){
     return $query->whereHas('subcats', function($q) use ($subID){
        $q->where('subcat_id', $subID);
      });
    }
    public function scopeByCat($query,$catID){
       return $query->whereHas('cats', function($q) use ($catID){
         $q->where('cat_id', $catID);
      });
    }

    public function scopeByArea($query, $areaID){
      return $query->whereHas('address', function($q) use ($areaID){
          $q->where('lga_id', $areaID);
        });
    } 

    public function photos()
    {
      return $this->hasMany('App\BizPhoto');
    }

    public function claim()
    {
      return $this->belongsTo('App\User','owner');
    }
}

