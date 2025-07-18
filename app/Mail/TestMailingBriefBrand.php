<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMailingBriefBrand extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $team;
    public $brand;                  
    public $link;                 
    

    public function __construct(array $data)
    {
        $this->team = $data['username'];
        $this->brand = $data['brand_name'];
        $this->link = $data['link'];
        
        //dd($data);
    }

    public function build()
    {        
        return $this->view('emails.brief-brand')
                    ->bcc(['rescate@preciso.pe'])
                    ->subject('¡Importante, revisa el brief aquí!')
                    ->with([
                        'team' => $this->team,
                        'brand'=>$this->brand,
                        'link'=>$this->link,
                    ]);
    }
}