<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'category' => ['required'],
            'description' => ['required', 'max:255'],
            'content' => ['required', 'max:10000'],
        ];

        if ($this->method() === 'POST') {
            $rules['blog_thumb'] = ['required', 'mimes:png,jpg,jpeg,webp'];
        }

        return $rules;
    }
}
