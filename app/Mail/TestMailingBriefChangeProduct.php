<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMailingBriefChangeProduct extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $team;                
    

    public function __construct(array $data)
    {
        $this->team = $data['username'];
        
    }

    public function build()
    {        
        return $this->view('emails.brief-change-product')
                    ->bcc(['rescate@preciso.pe'])
                    ->subject('¡Actualización importante!')
                    ->with([
                        'team' => $this->team
                    ]);
    }
}