<?php
namespace App\Http\Controllers;

use App\User;
use App\Mail\TestMailingBriefing;
use Illuminate\Support\Facades\Mail;
use Log;

class MailController extends Controller
{

    /**
     * @return void
     */
    public function mailingBrands()
    {
        /*ini_set('max_execution_time', '5000'); *///tiempo de ejecución
        
        $teams = User::where('situation','PARTICIPANTE')->where('username','like','E2024%')->get();
        Log::debug($teams->toArray());

        $numEntel = $numYape = $numBolivar = $numPilsen = $numAlicorp = $numLatam = 0;

        foreach($teams as $team) {
            foreach ($team->students as $student) {
                $brand = $team->caso->brand->name;
                switch ($brand) {
                    case 'Entel Perú':
                        $data = [
                            'username' => $team->username,
                            'brand_name' => $brand,
                            'meetingSchedule' => "12:00 - 1:00 PM",
                            'representativeBrand' => 'Maria Cristina Benavides Leon',
                            'positionCompany' => 'Analista publicidad',
                            'meetingLink' => 'https://us06web.zoom.us/j/84497656971?pwd=LsByDqYDGzbxZizzeFpGzuaZ8tD4lz.1'
                            
                        ];
                        $numEntel++;
                        break;
                    case 'Yape':
                        $data = [
                            'username' => $team->username,
                            'brand_name' => $brand,
                            'meetingSchedule' => "3:00 - 4:00 PM",
                            'representativeBrand'=>'Andrea Bauer Guevara',
                            'positionCompany' => 'Estrategia de marca',
                            'meetingLink'=>'https://us06web.zoom.us/j/86928217962?pwd=T4xuW2TRcSgdc6EURyDqZFQeGet1dB.1'
                        ];
                        $numYape++;
                        break; 
                    case 'Bolívar':
                        $data = [
                            'username' => $team->username,
                            'brand_name' => $brand,
                            'meetingSchedule' => "9:00 - 10:00 AM",
                            'representativeBrand' => 'Mauricio Bettocchi Chiappina',
                            'positionCompany' => 'Gerente de marca Senior',
                            'meetingLink' => 'https://us05web.zoom.us/j/85424257163?pwd=bmze9R1QckbW4dGa850k4v5A8Kl4bo.1',
                        ];
                        $numBolivar++;
                        break;
                    case 'Pilsen Callao':
                        $data = [
                            'username' => $team->username,
                            'brand_name' => $brand,
                            'meetingSchedule' => "4:30 - 5:30 PM",
                            'representativeBrand' => 'Valeria Garces Lozada',
                            'positionCompany' => 'Brand Manager',
                            'meetingLink' => 'https://us06web.zoom.us/j/89572936344?pwd=TUrJRrtxrXgh1lOobVdDnkCZB8vP5x.1'
                        ];
                        $numPilsen++;
                        break;     
                    case 'Alicorp Margarinas':
                        $data = [
                            'username' => $team->username,
                            'brand_name' => $brand,
                            'meetingSchedule' => "10:30 - 11:30 AM",
                            'representativeBrand' => 'Daniela Espinosa Lopez',
                            'positionCompany' => 'Gerente de Marketing de Oleaginosos',
                            'meetingLink' => 'https://us05web.zoom.us/j/87482792068?pwd=KtRXYPWoBFBQUffbsbcdfdAzHhbGqn.1'
                        ];
                        $numAlicorp++;
                        break;
                    case 'Latam Airlines':
                        $data = [
                            'username' => $team->username,
                            'brand_name' => $brand,
                            'meetingSchedule' => "6:00 -7:00 PM",
                            'representativeBrand' => 'Ana Sofía Avellaneda',
                            'positionCompany' => 'Líder de Sostenibilidad',
                            'meetingLink' => 'https://us06web.zoom.us/j/83633443182?pwd=rQA6tQg4ah5u8ezSOdcgCRSJ9J5UYS.1'
                        ];
                        $numLatam++;
                }
            }
            try {
                
                Mail::to('rescate@preciso.pe')->send(new TestMailingBriefing($data));
            } catch (Exception $exc) {
                Log::error('[MailController] mailingBrands - error-student : ' . $exc->getMessage());
            }
        }
        Log::debug('[MailController] mailingBrands - numEntel : ' . $numEntel);
        Log::debug('[MailController] mailingBrands - numYape : ' . $numYape);
        Log::debug('[MailController] mailingBrands - numBolivar : ' . $numBolivar);
        Log::debug('[MailController] mailingBrands - numPilsen : ' . $numPilsen);
        Log::debug('[MailController] mailingBrands - numAlicorp : ' . $numAlicorp);
        Log::debug('[MailController] mailingBrands - numLatam : ' . $numLatam);

    }
}