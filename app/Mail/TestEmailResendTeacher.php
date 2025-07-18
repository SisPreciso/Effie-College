<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmailResendTeacher extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $name;
    public $code;
    public $email;
    public $team;

    public function __construct(array $data)
    {
        //$this->data = $data;
        $this->name = $data['name'];
        $this->code = $data['code'];
        $this->email = $data['email'];
        $this->team = $data['team'];
        //dd($this->email);
    }

    public function build()
    {
        $subject = 'Bienvenido a Effie® College 2024';
        
        return $this->view('emails.teacher')
                    //->from($address, $name)
                    //->cc($address, $name)
                    //->bcc($address, $name)
                    ->bcc(['jaliano@preciso.pe'])
                    ->subject($subject)
                    ->with([
                        'name' => $this->name,  
                        'email' => $this->email,
                        'code'=> $this->code,   
                        'team'=> $this->team,
                    ]);
    }
}