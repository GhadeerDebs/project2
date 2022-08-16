<?php

namespace App\Mail;

use App\Models\Appoinment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emaildelete extends Mailable
{
    use Queueable, SerializesModels;

    public $uid;

    public function __construct($uid)
    {
        $this->uid=$uid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $uid=$this->uid;
        $app=Appoinment::where('user_id',$uid)->first();
        return $this->view('emails.deletApppintment');
    }
}
