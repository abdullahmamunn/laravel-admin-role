<?php

namespace App\Mail;

use App\WebConfig;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContentApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->content_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = 'newshop.ebd@gmail.com';
        $name = "Imamportal";

        return $this->from($email,$name)
                    ->subject('Content Approved')
                    ->markdown('emails.content-approved',[
                        'mail_data' => $this->content_data
                    ]);
    }
}
