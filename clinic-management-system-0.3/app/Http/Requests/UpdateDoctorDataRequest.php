<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorDataRequest extends FormRequest
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
            'user_id' => 'integer|required|exists:doctors,user_id|unique:doctors,user_id',
            'specialization' => 'sometimes|string|max:255',
            'license_number' => 'sometimes|string|max:255',
            'qualifications' => 'sometimes|string'
        ];
    }
}
