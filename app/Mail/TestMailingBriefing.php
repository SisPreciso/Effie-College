<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMailingBriefing extends Mailable
{
    use Queueable, SerializesModels;

    //public $data;
    public $team;
    public $brand; 
    public $meetingSchedule;          
    public $representativeBrand;                
    public $positionCompany;                 
    public $meetingLink;                 
    
    public function __construct(array $data)
    {

        $this->team = $data['username'];
        $this->brand = $data['brand_name'];
        $this->meetingSchedule = $data['meetingSchedule'];
        $this->representativeBrand = $data['representativeBrand'];
        $this->positionCompany = $data['positionCompany'];
        $this->meetingLink = $data['meetingLink'];
        //dd($data);
    }

    public function build()
    {
        $subject = 'Conéctense a la reunión de briefing';
        return $this->view('emails.meeting-brand')
                    ->bcc(['rescate@preciso.pe'])
                    ->subject($subject)
                    ->with([
                        'team' => $this->team,
                        'brand'=>$this->brand,
                        'meetingSchedule'=>$this->meetingSchedule,
                        'representativeBrand'=>$this->representativeBrand,
                        'positionCompany'=>$this->positionCompany,
                        'meetingLink'=>$this->meetingLink,
                    ]);
    }

   
}