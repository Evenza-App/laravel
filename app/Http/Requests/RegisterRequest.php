<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'unique:users,email'],
            //  'birthDate' => ['required', 'date', 'before:' . now()->startOfYear()->subYears(10)->toDateString()],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'address' => ['required', 'string'],
            'password' => [
                'required', 'string', Password::defaults()->min(5)->max(10)
                    ->letters(),
                'fcm_token' => ['required', 'string'],
                // ->symbols()
                // ->numbers()
            ],
        ];
    }
}
