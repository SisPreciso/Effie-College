<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'teachers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'teacher_name',
        'teacher_lastname',
        'teacher_email',
        'teacher_document_type_id',
        'teacher_document',
        'teacher_mobile',
        'teacher_profession',
        'teacher_college_id',
    ];

    /**
     * @return BelongsTo
     */
    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'teacher_document_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'teacher_college_id');
    }

    /**
     * @return HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(User::class)->whereNotIn('situation', ['JURADO', 'TUTOR']);
    }
}
