<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [ 'required', 'string' ],
            'job' => [ 'required', 'string'],
            'content' => [ 'required', 'string' ]
        ];

        if (Profile::find(1)->img_profile === null) {
            $rules['img_profile'] = [ 'required', 'image', 'dimensions:ratio=1/1'];
        } else {
			$rules['img_profile'] = [ 'image', 'dimensions:ratio=1/1'];
		}

        return $rules;
    }
}
