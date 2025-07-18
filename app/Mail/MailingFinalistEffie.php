<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailingFinalistEffie extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $team;
    public $brand;

    public function __construct(array $data)
    {
        //$this->data = $data;
        $this->team = $data['username'];
        $this->brand = $data['brand'];
        
        
        //dd($data);
    }

    public function build()
    {
        $subject = '¡Felicidades, son finalistas en Effie College 2024!';
        
        return $this->view('emails.finalist-effie')
                    ->bcc(['rescate@preciso.pe'])
                    ->subject($subject)
                    ->with([
                        'team' => $this->team,
                        'brand' => $this->brand
                    ]);
    }
}