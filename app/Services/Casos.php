<?php

namespace App\Services;

use App\Caso;
use App\User;

class Casos
{
    public function get($edition)
    {
        $casos = Caso::leftJoin('brands', 'brands.id', 'casos.brand_id')
            ->leftJoin('editions', 'editions.id', 'casos.edition_id')
            ->where('editions.name', $edition)
            ->orderBy('brands.name')
            ->get('casos.*');
        $array = [];

        foreach ($casos as $caso) {
            $array[$caso->id] = [
                'id' => $caso->brand->id,
                'brand' => $caso->brand->name,
                'image' => $caso->brand->image,
                'description' => $caso->brand->description,
                'groups_count' => Caso::withCount(['teams'])->find($caso->id)->teams_count,
            ];
        }

        return $array;
    }
}
