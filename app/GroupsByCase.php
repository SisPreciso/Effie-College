<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupsByCase extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'groups_by_cases';

    /**
     * @var string[]
     */
    protected $fillable = [
        'quantity',
    ];

    /**
     * @return int
     */
    public static function maxGroups(): int
    {
        return self::first()->quantity;
    }
}
