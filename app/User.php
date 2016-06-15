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
    public $sessionValue=null;

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
        'last_name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
	
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
        return $this->hasMany('App\Biz','user_id');
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
        //dd($userData->avatar_original);
        $mailer=new UserMailer();
        $user = User::where('email',$userData->email)->first();
        if( $user )
        {

            $oldUser=$this->updateUser($user,$userData,$mailer);
            return $oldUser;
        }
        else{
              if( ! isset($userData->email) || ! isset($userData->user['verified']))
                 {
                    \Session::flash('error', 'Your email is not set/verified in Facebook, please register by providing your email and password below.');
                    return redirect('register');
                 }

                $user2= $this->creatNewUser($userData); 
                $user2->confirmed=1;          
                $user2->save();
               // $mailer->facebookWelcome($user2);
            return $user2;
        }
    }

    public function updateUser($user, $userData,$mailer)
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

            if (isset($userData->avatar_original))
            {
                if(! isset($user->profilePhoto))
                {
                $pic = new ProfilePhoto();
                $pic->image=$userData->avatar_original;
                $user->profilePhoto()->save($pic);
                }
                else{
                $pic2=ProfilePhoto::where('image',$user->profilePhoto->image)->first();
                $pic2->image=$userData->avatar_original;
                $user->profilePhoto()->save($pic2);
                }

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
                 'gender'=>$userData->user['gender']
            ]);

            if (isset($userData->avatar_original))
            {

                $picc = new ProfilePhoto();
                $picc->image=$userData->avatar_original;
                $newUser->profilePhoto()->save($picc);                
            }

            return $newUser;

    }
}
