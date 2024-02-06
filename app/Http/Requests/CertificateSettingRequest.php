<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateSettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ceo_name' => ['required', 'string', 'max:115'],
            'teacher_name' => ['required', 'string', 'max:115'],
            'ceo_signature' => ['nullable', 'file', 'image', 'max:2048', 'mimes:png'],
            'teacher_signature' => ['nullable', 'file', 'image', 'max:2048', 'mimes:png']
        ];
    }
}
