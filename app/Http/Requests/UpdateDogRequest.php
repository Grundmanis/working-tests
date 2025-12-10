<?php

namespace App\Http\Requests;

use App\Models\Dog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDogRequest extends FormRequest
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
            'registeredName' => ['required', 'string', Rule::unique('dogs', 'registeredName')->ignore($this->route('dog'))],
            'homeName' => 'required|string',
            'registrationNumber' => 'required|string',
            'microchip' => 'required|string',
            'dob' => 'required|string',
            'gender' => ['required', 'string', Rule::in(array_keys(Dog::$genders))],
            'breed' => ['required', 'string', Rule::in(array_keys(Dog::$breeds))],
        ];
    }
}
