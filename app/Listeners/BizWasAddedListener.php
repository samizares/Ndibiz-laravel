<?php

namespace App\Listeners;

use App\Events\BizWasAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Mailers\UserMailer;
use App\Biz;


class BizWasAddedListener
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
     * @param  BizWasAdded  $event
     * @return void
     */
    public function handle(BizWasAdded $event)
    {
        $biz=Biz::where('id',$event->id)->first();
        $this->mailer->informAdminBiz($biz);
    }
}
