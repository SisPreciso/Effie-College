<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caso extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'casos';

    /**
     * @var string[]
     */
    protected $fillable = [
        'edition_id',
        'brand_id',
        'description',
        'brief',
        'audio',
        'visual',
        'whole',
    ];

    /**
     * @return BelongsTo
     */
    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    /**
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(User::class)->whereNotIn('situation', ['JURADO', 'TUTOR']);
    }
}
