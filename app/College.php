<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'colleges';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'businessname',
        'ruc',
        'address',
        'phone',
        'is_active',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * @var false[]
     */
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * @return HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
