<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'students';

    /**
     * @var string[]
     */
    protected $fillable = [
        'student_name',
        'student_lastname',
        'student_email',
        'student_document_type_id',
        'student_document',
        'student_mobile',
        'student_college_id',
        'student_career_id',
        'student_cycle_id',
    ];

    /**
     * @return BelongsTo
     */
    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'student_document_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'student_college_id');
    }

    /**
     * @return BelongsTo
     */
    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class, 'student_career_id');
    }

    /**
     * @return BelongsTo
     */
    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class, 'student_cycle_id');
    }

    /**
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
