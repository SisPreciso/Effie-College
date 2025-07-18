<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmailResend extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $team;
    public $code;

    public function __construct(array $data)
    {
        //$this->data = $data;
        $this->team = $data['username'];
        $this->code = $data['code'];
        //dd($this->data);
    }

    public function build()
    {
        //$address = 'jaliano@preciso.pe';
        //$subject = '['.config('app.name', 'Laravel').'] Habilitación del caso Entel en la plataforma';
        //$name = 'Effie® College Perú 2020';
        $subject = 'Bienvenido a Effie® College 2024';
        
        return $this->view('emails.verify')
                    //->from($address, $name)
                    //->cc($address,$subject)
                    //->bcc($address, $name)
                    //->replyTo($reply)
                    ->bcc(['jaliano@preciso.pe'])
                    ->subject($subject)
                    ->with([
                        'username' => $this->team,
                        'code'=> $this->code,
                    ]);
    }
}