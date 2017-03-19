<?php

namespace App\Listeners;
use App\Events\UserWasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Mailers\UserMailer;
use App\User;


class AdminNotifier
{
    protected $id;
    protected $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer= $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserWasRegistered  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {
        $user= User::where('id',$event->id)->first();
        $this->mailer->informAdminUser($user);
    }
}
