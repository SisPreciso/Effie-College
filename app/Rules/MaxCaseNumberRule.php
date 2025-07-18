<?php

namespace App\Rules;

use App\Caso;
use App\GroupsByCase;
use Illuminate\Contracts\Validation\Rule;

class MaxCaseNumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $teamsCount = Caso::withCount(['teams'])->find($value)->teams_count;
        $maxGroups = GroupsByCase::maxGroups();

        return $maxGroups > $teamsCount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Sugerimos que escojas otra marca, porque esta ya tiene la cuota de equipos completa.';
    }
}
