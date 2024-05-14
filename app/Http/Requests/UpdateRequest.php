<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $user = User::find($this->users);
        return [
            'name' => ['required', 'string'],
            // 'email' => ['string', 'unique:users,email'],
            // 'email' => ' required|email|unique:users,email,' . $user->id,
            'email' => ['string', 'unique:users,id,' . $this->get('id')],
            ///'user_id' => ['integer', 'exists:users,id'],
            //'user_email' => ['string', 'exists:users,email'],
            ///  'email'    => ['string', Rule::unique('users', 'email')->ignore($this->user_id)],
            // 'birthDate' => ['required', 'date', 'before:' . now()->startOfYear()->subYears(10)->toDateString()],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'address' => ['required', 'string'],
            'password' => [
                'nullable', 'string', Password::defaults()->min(5)->max(25)
                    ->letters(),
            ],
        ];
    }
    // public function rules()
    // {
    //     $user_id = $this->session()->get('editableUser');

    //     return [
    //         'username'  => ['required', Rule::unique('users', 'name')->ignore($user_id)],
    //         'email'     => ['required', 'email', Rule::unique('users', 'email')->ignore($user_id)],
    //     ];
    // }


    // public function show(User $user)
    // {
    //     $roles = Role::whereDoesntHave('users', function ($query) use ($user) {
    //         $query->where('id', '=', $user->id);
    //     })->pluck('display_name', 'id');

    //     Session::put('editableUser', $user->id);

    //     return view('admin.users.show', compact('user', 'roles'));
    // }
}
