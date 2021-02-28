<?php

namespace App\Mail\ContactUs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    Public $Email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data =$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'body'      => $this->data['body']
        ];

        return $this->subject('Reply From: Baitna Depot Team ')
            ->view('admin.contactus-msg.email.email')
            ->with(['data' => $data]);
    }
}
