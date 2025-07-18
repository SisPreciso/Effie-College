<?php

namespace App\Services;

use App\Answer;

class Answers
{
    /**
     * @param string $code
     * @param string $username
     * @return mixed
     */
    public function get(string $code, string $username)
    {
        return Answer::leftJoin('questions', 'questions.id', 'answers.question_id')
            ->leftJoin('users', 'users.id', 'answers.user_id')
            ->where('users.username', $username)
            ->where('questions.code', $code)
            ->get('answers.*')
            ->first();
    }
}
