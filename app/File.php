<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    //use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'files';

    /**
     * @var string[]
     */
    protected $fillable = [
        'filename',
        'filedata',
        'user_id',
    ];

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
