<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\Mailers\UserMailer;

class EmailController extends Controller
{
    protected $mailer;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
     {
        $this->mailer= $mailer;
        $this->middleware(['auth'],['except'=>['sendTest']]);
    }

    public function sendTest()
    {   
        $this->mailer->sendTestActivation();

        return 'Message sent successfully';
    }

    public function resendConfirmation()
    {
        $user= \Auth::user();
        $code= $user->confirmation_code;
        $this->mailer->sendActivation($user, $code);
        return view('emails.activation-ack',compact('user'));

    }
}

