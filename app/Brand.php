<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'brands';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    /**
     * @return HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(Caso::class);
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['name'] ?? null, function (Builder $query, string $name) {
            $query->where('name', 'like', "%{$name}%");
        });
    }
}
