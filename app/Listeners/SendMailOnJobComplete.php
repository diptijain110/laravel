<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\JobCompleted;
use Mail;

class SendMailOnJobComplete
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
     * @param  object  $event
     * @return void
     */
    public function handle(JobCompleted $event)
    {
       echo $input['subject'] = $event->subject;

     
            $input['email'] = 'dipti0126@gmail.com';
            $input['name'] = 'Dipti';
           Mail::send('mail.Test_mail', [], function($message) use($input){
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });

        
    }
}
