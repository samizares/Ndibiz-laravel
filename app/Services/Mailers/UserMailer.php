<?php
namespace App\Services\Mailers;
use Illuminate\Contracts\Auth\Guard;
use App\User;

class UserMailer extends Mailer
{
    protected $user;
    protected $auth;
    protected $guard;
    
  //  function __construct()
  //  {
   //     $this->user = \Auth::user();
       // $this->guard =$guard;
   // }
    
    public function subscribed()
    {
        $subject    = 'Welcome to the site!';
        $view       = 'emails.user.subscribed';
        $data       = ['enter view data here'];
       // $this->emailTo($this->user, $view, $data, $subject);
    }
    
    public function upgraded()
    {
        $subject    = 'Membership upgraded!';
        $view       = 'emails.user.upgraded';
        $data       = ['enter view data here'];
       // $this->emailTo($this->user, $view, $data, $subject);
    }

    public function facebookWelcome($user)
    {
        $subject ='Thank you for registering with Beazea.com';
        $sender  ='support@beazea.com';
        $view    ='emails.facebookWelcome';
        $data    =['username'=> $user->username];
        $this->emailTo($user, $view, $data, $subject,$sender);
    }

    public function sendActivation($user, $code)
    {
        $data=[];
        $data['confirmation_code'] = $code;
        $subject ='Activate your beazea account';
        $sender  ='support@beazea.com';
        $view    ='emails.activate';
        $data['username']= $user->username;
        $this->emailTo($user, $view, $data, $subject,$sender);
    }

    public function sendTestActivation()
    {
      $data=[];
      $data['username']="sammy and bolaji";
      $data['confirmation_code'] = str_random(6);
      $subject ='Testing activation emails';
      $sender= 'support@beazea.com';
      $view ='emails.facebookWelcome';
      $user='samizares@beazea.com';
       $this->sendTo($user, $view, $data, $subject,$sender);
    }

    public function sendEmail(array $data)
    {
        \Mail::send('emails.activate', ['data'=>$data], function($message) use ($data) {
                $message->to($data['email'], $data['username'])
                        ->from('support@beazea.com')
                    ->subject('Beazea: Verify your email address');
            });

    }
    public function informAdminUser($user)
    {
      $data=[];
      $data['username']=$user->username;
      $data['profile_link']=url('/profile/'.$user->username.'/'.$user->id);
      $data['user_image']=isset($user->profilePhoto) ? asset($user->profilePhoto->image) : asset('img/user.PNG');
      $subject='A new user '.$user->username.' has been registered';
      $view='emails.informAdmin_user';
      $sender='info@beazea.com';
      $admins=['support@beazea.com','olisaamobi111@gmail.com','bolajialade.work@gmail.com','samizares@gmail.com'];
      $this->sendTo($admins, $view, $data, $subject,$sender);


    }
    
     public function informAdminBiz($biz)
    {
      $data=[];
      $data['title']=$biz->title;
      //$owner_id=
      $data['owner']=$biz->ownerbiz->username;
      $data['profile_link']=url('/biz/profile/'.$biz->slug.'/'.$biz->id);
      $data['biz_image']=isset($biz->profilePhoto) ? asset($biz->profilePhoto->image) : asset('img/finish4.PNG');
      $subject='A new business '.$biz->title.' has been registered by '.$data['owner'];
      $view='emails.informAdmin_biz';
      $sender='info@beazea.com';
      $admins=['support@beazea.com','olisaamobi111@gmail.com','bolajialade.work@gmail.com','samizares@gmail.com'];
      $this->sendTo($admins, $view, $data, $subject,$sender);

    }
}