<?php

namespace App\Http\Requests\API\Edition;

use App\Http\Requests\API\ResponseRequest;

class StoreEditionRequest extends ResponseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', 'unique:editions,name'],
        ];
    }
}
