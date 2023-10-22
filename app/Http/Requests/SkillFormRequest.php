<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class SkillFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'text_primary' => [ 'required', 'string' ],
            'text_secondary' => [ 'required', 'string' ],
        ];

        if ($this->method() == 'POST') {
            $rules['img_skill'] = [ 'required', 'image', 'dimensions:ratio=1/1' ];
        }

        return $rules;
    }
}
