<?php

namespace App\Http\Requests\API\Login;

use App\Http\Requests\API\ResponseRequest;

class StoreLoginRequest extends ResponseRequest
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
            'username' => ['required', 'string', 'exists:users,username'],
            'password' => ['required', 'string'],
        ];
    }
}
