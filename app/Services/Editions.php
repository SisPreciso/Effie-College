<?php

namespace App\Services;

use App\Edition;

class Editions
{
    /**
     * @return array
     */
    public function get(): array
    {
        $editions = Edition::orderBy('name', 'desc')->get();
        $array = [];

        foreach ($editions as $edition) {
            $array[$edition->id] = $edition->name;
        }

        return $array;
    }
}
