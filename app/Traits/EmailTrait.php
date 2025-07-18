<?php

namespace App\Traits;

use App\User;
use Illuminate\Support\Facades\Mail;

trait EmailTrait
{
    /**
     * @param User $user
     * @param string $email
     * @return void
     */
    protected function sendPostFormEmail(User $user, string $email)
    {
        Mail::send('new.emails.sendemail-form', [
            'username' => $user->username,
            'finalistsDate' => 'lunes 4 de noviembre',
        ], function ($message) use ($user, $email) {
            $message->to($email)
                ->bcc(['rescate@preciso.pe'])
                ->subject('¡Ya recibimos tu Formulario de Participación!');
        });
    }
}
