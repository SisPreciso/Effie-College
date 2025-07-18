<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edition extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'editions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(Caso::class);
    }

    /**
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
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
