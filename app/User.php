<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected const EMAIL_ACT_ACCNT = 'Bienvenido a Effie College 2024';
    protected const EMAIL_PSW_RESET = '[Effie College 2024] Notificación de restablecimiento de contraseña';
    protected const LONGITUD_CODIGO = 60;
    protected const LONGITUD_PSSWRD = 8;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'school',
        'situation',
        'caso_id',
        'college_id',
        'teacher_id',
        'is_completed',
        'is_finished',
    ];

    /**
     * Default values for attributes
     * @var array an array with attribute as key and default as value
     */
    protected $attributes = [
        'is_admin' => false,
        'is_viewed' => false,
        'is_completed' => false,
        'is_finished' => false,
    ];

    /**
     * Protected attributes that CANNOT be mass assigned.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'is_admin',
        'is_viewed',
        'username',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'is_admin',
        'password',
        'confirmation_code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function caso(): BelongsTo
    {
        return $this->belongsTo(Caso::class);
    }

    /**
     * @return BelongsTo
     */
    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class);
    }

    /**
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)
            ->wherePivotNull('deleted_at')
            ->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * @return HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    /**
     * @return HasMany
     */
    public function reviewsLikeTeam(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return HasMany
     */
    public function reviewsLikeJury(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return HasMany
     */
    public function reviewsByAuth(): HasMany
    {
        return $this->hasMany(Review::class)->where('jury_id', auth()->user()->id);
    }

    /**
     * Boot function for using with User Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function (User $user) {
            if ($user->situation === 'TUTOR') {
                $user->username = $user->teacher->teacher_email;
            } else {
                $code = User::where('username', 'like', 'E' . date('Y') . '%')
                    ->max(DB::raw('substr(username,6,3)'));
                $user->username = 'E' . date('Y') . str_pad(++$code, 3, '0', STR_PAD_LEFT);
            }

            $user->generateConfirmationCode();

            return true;
        });
    }

    /**
     * Generates the value for the User::confirmation_code field. Used to
     * activate the user's account.
     *
     * @return bool
     */
    protected function generateConfirmationCode(): bool
    {
        $length = strlen(self::PERMITTED_CHARS);
        $rndStr = '';

        for ($i = 0; $i < self::LONGITUD_CODIGO; $i++) {
            $rndChr = self::PERMITTED_CHARS[mt_rand(0, $length - 1)];
            $rndStr .= $rndChr;
        }

        $this->attributes['confirmation_code'] = $rndStr;

        return !is_null($this->attributes['confirmation_code']);
    }

    /**
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $teacher = self::teacher()->get()->first();

        self::sendEmail($teacher->teacher_email, $teacher->teacher_name, $this->confirmation_code, 'emails.verify', self::EMAIL_ACT_ACCNT);

        $students = self::students()->get();

        foreach ($students as $student)
            self::sendEmail($student->student_email, $student->student_name, $this->confirmation_code, 'emails.verify', self::EMAIL_ACT_ACCNT);
    }

    /**
     * @param $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        self::sendEmail($this->email, NULL, $token, 'emails.reset', self::EMAIL_PSW_RESET);
    }

    /**
     * @param $email
     * @param $name
     * @param $code
     * @param $template
     * @param $subject
     * @return void
     */
    protected function sendEmail($email, $name, $code, $template, $subject)
    {
        $data = array('name' => $name, 'username' => $this->username, 'code' => $code);

        Mail::send($template, $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject("$subject - {$this->username}");
        });
    }
}
