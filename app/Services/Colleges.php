<?php

namespace App\Services;

use App\College;

class Colleges
{
    public function get()
    {
        $colleges = College::where('is_active', true)->orderBy('name')->get();
        $array = [];

        foreach ($colleges as $college) {
            $array[$college->id] = $college->name;
        }

        return $array;
    }
}
