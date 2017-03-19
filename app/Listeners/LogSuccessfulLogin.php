<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user= $event->user;
        $adminArray=['samizares@beazea.com','bolaji@beazea.com','david@beazea.com'];
        foreach ($adminArray as $admin){
            if($user->email === $admin)
            {
                $user->admin=1;
                $user->save();
            }
        }
        
    }
}
