<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Services\Mailers\UserMailer;
use App\AuthenticateUser;
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
    protected $fillable = ['username', 'email', 'password', 'confirmation_code','gender','first_name',
        'last_name','facebookID','facebook'];

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
		$user->confirmation_code = null;
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

     public function updateCreateUser($userData)
    {   
        
        $mailer=new UserMailer();
        $user = User::where('email',$userData->email)->first();
        if( $user )
        {

            $oldUser=$this->updateUser($user,$userData);
            return $oldUser;
                return redirect('/profile');
        }
        else{
              if( ! isset($userData->email) || ! $userData->user['verified'])
                 {
                    \Session::flash('error', 'Your email is not set/verified in Facebook, please register by providing your email and password below.');
                    return redirect('register');
                 }

                $user2= $this->creatNewUser($userData); 
                $user2->confirmed=1;          
                $user2->save();
                $mailer->facebookWelcome($user2);
            return $user2;
        }
    }

    public function updateUser($user, $userData)
    {
        if(isset($userData->nickname))
            {
                $user->username=$userData->nickname;
            }

            if(isset($userData->user['first_name']))
            {
                $user->first_name=$userData->user['first_name'];
            }

             if(isset($userData->user['last_name']))
            {
                $user->last_name=$userData->user['last_name'];
            }

            if(isset($userData->user['gender']))
            {
                $user->gender= $userData->user['gender'];
                
            }
            if(isset($userData->user['link']))
            {
                $user->facebook=$userData->user['link'];
            }

            if(isset($userData->id))
            {
                $user->facebookID= $userData->id;

            }


            if (isset($userData->avatar))
            {
                $pic = new ProfilePhoto();
                $pic->image=$userData->avatar;
                $user->profilePhoto()->save($pic);

             }
             if(!isset($user->confirmed))
             {
                $mailer->facebookWelcome($user);
                 $user->confirmed=1;
             }
             $user->sessionValue='You logged in with Facebook';
                $user->save();
             return $user;
    }

    public function creatNewUser($userData)
    {
        $newUser=User::firstOrCreate([
                 'username'=> isset($userData->nickname) ? $userData->nickname : $userData->user['first_name'],
                 'email' =>$userData->email,
                 'first_name'=>$userData->user['first_name'],
                 'last_name'=>$userData->user['last_name'],
                 'gender'=>$userData->user['gender'],
                 'facebook'=>$userData->user['link'],
                 'facebookID'=>$userData->id
            ]);

            if ($userData->avatar)
            {

                $picc = new ProfilePhoto();
                $picc->image=$userData->avatar;
                $newUser->profilePhoto()->save($picc);                
            }

            return $newUser;

    }
}
