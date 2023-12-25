<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array{
     *     name: array<ValidationRule|string>,
     *     job: array<ValidationRule|string>,
     *     avatar_id: array<ValidationRule|string>,
     * }
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'job' => ['required', 'string'],
            'avatar_id' => ['required'],
        ];
    }
}
