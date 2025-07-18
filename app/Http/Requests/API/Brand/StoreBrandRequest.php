<?php

namespace App\Http\Requests\API\Brand;

use App\Http\Requests\API\ResponseRequest;

class StoreBrandRequest extends ResponseRequest
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
            'name' => ['required', 'string', 'max:50', 'unique:brands,name'],
            'image' => ['required', 'image', 'max:100'],
            'description' => ['nullable', 'string'],
        ];
    }
}
