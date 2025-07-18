<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Caso;
use App\Student;
use App\Teacher;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    /**
     * @return string
     */
    public function __invoke(): string
    {
        DB::transaction(function () {
            /** @var Collection $users */
            $users = User::with(['teacher', 'students'])->where('situation', 'PARTICIPANTE')->whereNull('password')->where('username', 'like', '%2023%')->get();

            /** @var User $user */
            foreach ($users as $user) {
                $userName = $user->username;

                /** @var Teacher $teacher */
                $teacher = $user->teacher;

                try {
                    Mail::send('new.emails.reminder', [
                        'userName' => $userName,
                    ], function ($message) use ($teacher, $userName) {
                        $message->to($teacher->teacher_email)
                            ->bcc(['jportocarrero@preciso.pe'])
                            ->subject("Activa tu cuenta de Effie College 2023 - {$userName}");
                    });
                } catch (Exception $exception) {
                    Log::error('error-teacher:' . $exception->getMessage());
                }

                /** @var Student $student */
                foreach ($user->students as $student) {
                    try {
                        Mail::send('new.emails.reminder', [
                            'userName' => $userName,
                        ], function ($message) use ($student, $userName) {
                            $message->to($student->student_email)
                                ->bcc(['jportocarrero@preciso.pe'])
                                ->subject("Activa tu cuenta de Effie College 2023 - {$userName}");
                        });
                    } catch (Exception $exception) {
                        Log::error('error-student:' . $exception->getMessage());
                    }
                }
            }
        }, 5);

        return 'Brief enviados satisfactoriamente.';
    }
}
