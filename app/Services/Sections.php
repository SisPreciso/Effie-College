<?php

namespace App\Services;

use App\Section;

class Sections
{
    /**
     * @param string $code
     * @return mixed
     */
    public function get(string $code)
    {
        return Section::with(['questions'])->where('code', $code)->get()->first();
    }
}
