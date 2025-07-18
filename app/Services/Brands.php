<?php

namespace App\Services;

use App\Brand;

class Brands
{
    /**
     * @return array
     */
    public function get(): array
    {
        $brands = Brand::orderBy('name')->get();
        $array = [];

        foreach ($brands as $brand) {
            $array[$brand->id] = $brand->name;
        }

        return $array;
    }
}
