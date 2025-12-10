<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string',
            'judges' => 'array|min:1',
            'judges.*' => 'exists:judges,id',
            // JSON payload of disciplines
            'disciplines_payload' => 'required|array',
            'disciplines_payload.*.id' => ['required', 'integer'],
            'disciplines_payload.*.id' => ['required', 'integer', 'exists:disciplines,id'],
            'disciplines_payload.*.day' => ['required', 'date'],
            'disciplines_payload.*.max_participants' => ['required', 'integer'],
            'disciplines_payload.*.categories' => ['required', 'array', 'min:1'],
            'disciplines_payload.*.categories.*.id' => ['required', 'integer', 'exists:categories,id'],
            // TODO: add prices and settings
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'judges' => json_decode($this->judges, true),
            'disciplines_payload' => json_decode($this->disciplines_payload, true),
            'settings' => isset($this->settings) ? $this->settings : [
                'club_discount' => false,
                'prepayment_required' => false,
                'breakfast_included' => false
            ],
        ]);
    }
}
