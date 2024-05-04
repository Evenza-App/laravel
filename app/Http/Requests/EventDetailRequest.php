<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventDetailRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'options' => ['required', 'json'],
            'is_required' => ['required', 'boolean'],
            'event_id' => ['required', 'integer', 'exists:events,id'],

        ];
    }
}
