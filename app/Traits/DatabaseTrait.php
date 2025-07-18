<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait DatabaseTrait
{
    /**
     * @param string $path
     * @return bool
     */
    public function generateDataSql(string $path): bool
    {
        $connection = config('database.default');
        $database = config("database.connections.{$connection}.database");
        $path = public_path($path);
        $oldSql = file_get_contents($path);
        $newSql = str_replace('effie_college', $database, $oldSql);

        return DB::unprepared($newSql);
    }
}
