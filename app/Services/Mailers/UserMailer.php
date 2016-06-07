<?php
namespace App\Services\Mailers;
use Illuminate\Contracts\Auth\Guard;

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
      $view ='emails.activate';
      $user='samizares@beazea.com';
       $this->sendTo($user, $view, $data, $subject,$sender);
    }
    
}