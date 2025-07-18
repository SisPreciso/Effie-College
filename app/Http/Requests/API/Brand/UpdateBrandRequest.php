<?php

namespace App\Http\Requests\API\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50', 'unique:brands,name,' . $this->brand->id],
            'image' => ['nullable', 'image', 'max:100'],
            'description' => ['nullable', 'string'],
        ];
    }
}
