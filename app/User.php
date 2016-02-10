<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    public function updateCredentials($input)
    {
        $this->notify = isset($input['notify']) ? 1 : 0;
        $this->save();
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'confirmation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
	
	public function accountIsActive($code)
	{
		$user = User::where('confirmation_code', '=', $code)->first();
		$user->confirmed = 1;
		$user->confirmation_code = '';
		if($user->save()) {
		\Auth::login($user);
		}
		return true;
	}

    public function favours()
    {
        return $this->belongsToMany('App\Biz','favourites','user_id','biz_id');
    }

     public function subscribeBiz()
    {
      return $this->belongsToMany('App\Biz', 'biz_user_pivot','user_id','biz_id');
    }

     public function subscribeCat()
    {
      return $this->belongsToMany('App\Cat', 'cat_user_pivot','user_id','cat_id');
    }

    public function biz()
    {
        return $this->hasMany('App\Biz');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function claims()
    {

        return $this->hasMany('App\Biz','owner');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
    public function profilePhoto()
    {
        return $this->hasOne('App\ProfilePhoto');
    }
}
