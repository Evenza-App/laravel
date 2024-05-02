<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'image' => ['nullable', 'image'],
            'start_time' => ['required', 'string'],
            'end_time' => ['required', 'string'],
            'date' => ['required', 'date', 'After:'.now()->startOfYear()->subYears(10)->toDateString()],
            'number_of_people' => ['required', 'integer', 'min:0', 'max:600'],
            'location' => ['required', 'string'],
            'event_id' => ['required', 'integer', 'exists:events,id'],
            'photographer_id' => ['required', 'integer', 'exists:photographers,id'],
            'buffet_ids' => ['required', 'array'],
            'buffet_ids.*' => ['integer', 'exists:buffets,id'],
            'details' => ['required', 'array'],
            'details.*.event_detail_id' => ['integer', 'exists:event_details,id'],
            'details.*.value' => ['required', 'string'],
        ];
    }
}
