<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PreRegistration;

class PreRegistrationRequest extends FormRequest
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
            //
            'surname' => ['required', 'string', 'max:50'],
            'firstname' => ['required', 'string', 'max:50'],
            'middlename' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'lowercase', 'max:255', "unique:".PreRegistration::class],
            'phone' => ['required', 'string', 'max:11']
        ];
    }
}
