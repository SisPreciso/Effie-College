<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmailChangeBrand extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $team;
    

    public function __construct(array $data)
    {
        //$this->data = $data;
        $this->team = $data['username'];
        //dd($data);
    }

    public function build()
    {
        $subject = 'Importante: Confirma tu nueva marca';
        
        return $this->view('emails.brand-change')
                    //->from($address, $name)
                    //->cc($address, $name)
                    //->bcc($address, $name)
                    //->replyTo($reply)
                    ->bcc(['jaliano@preciso.pe'])
                    ->subject($subject)
                    ->with([
                        'team' => $this->team,
                    ]);
    }
}