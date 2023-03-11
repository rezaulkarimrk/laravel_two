<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Auth;
use App\Mail\UserMail;

class SendPostNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostProcessed $event): void
    {
        $users = User::all();
        foreach($users as $user){
            \Mail::to($user->email)->send(new UserMail($event->post));
        }
        // \Mail::to(Auth::user()->email)->send(new UserMail($event->post));
    }
}
