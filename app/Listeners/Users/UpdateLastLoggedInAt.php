<?php

namespace App\Listeners\Users;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\User;
use Auth;

class UpdateLastLoggedInAt
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
        
     
        $user = User::find($event->user->id);

           $databaseDate = $user->last_logged_in_at;
           $currentDate = Carbon::now()->toDateString();
           if($databaseDate != $currentDate){
            $user->last_logged_in_at = Carbon::now()->toDateString();
            if($user->times_logged_in < 5){
                $user->times_logged_in++;
            }
   
            $user->save();
           }

        }
    }

