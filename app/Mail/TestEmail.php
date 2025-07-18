<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        //$address = 'noreply@effiecollege.com';
        // $subject = '['.config('app.name', 'Laravel').'] Habilitación del caso Entel en la plataforma';
        // $subject = '['.config('app.name', 'Laravel').'] Reprogramación - Briefing Eureka';
        // $subject = '['.config('app.name', 'Laravel').'] Brief de Eureka e ingreso a la plataforma';
        // $subject = '['.config('app.name', 'Laravel').'] - Activación de cuenta';
        //$name = 'Effie® College Perú 2020';

        /*
        return $this->view('emails.brief.forward')
        //->from($address, $name)
        //->cc($address, $name)
        //->bcc($address, $name)
        //->replyTo($reply)
        ->subject($subject)
        ->with([
            'team' => $this->data['team'],
            'brand' => $this->data['brand'],
            'schedule' => $this->data['schedule'],
            'link' => $this->data['link'],
        ]);
        */
        
        /*
        return $this->view('emails.brief.forward')
        ->subject($subject)
        ->with([
            'username' => $this->data['username'],
            'code' => $this->data['code'],
        ]);
        */
        
        /*
        return $this->view('emails.teacher')
        ->subject($subject)
        ->with([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'team' => $this->data['team'],
            'code' => $this->data['code'],
        ]);
        */
        
        /*
        $subject = '['.config('app.name', 'Laravel').'] - Formulario de participación';

        return $this->view('emails.warning.all-brands')->subject($subject)->with([
            'username' => $this->data['username'],
            'brand' => $this->data['brand'],
        ]);
        */
        
        $subject = '['.config('app.name', 'Laravel').'] - Revisa tu formulario';

        return $this->view('emails.new.message')->subject($subject)->with([
            'username' => $this->data['username'],
            // 'code' => $this->data['code'],
        ]);
    }
}