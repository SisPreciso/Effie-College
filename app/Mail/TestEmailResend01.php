<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmailResend01 extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $teams;

    public function __construct(array $data)
    {
        $this->teams = $data['username'];
    }

    public function build()
    {
        $subject = 'Corrección en los enlaces de la reunión de briefing';
        return $this->view('emails.verify2')
                    ->bcc(['rescate@preciso.pe'])
                    ->subject($subject)
                    ->with([
                        'team' => $this->teams,   
                    ]);
    }
}