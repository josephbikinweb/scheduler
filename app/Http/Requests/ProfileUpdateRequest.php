<?php
namespace App\Http\Requests;

use App\Models\User;
// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'max:255'],
            'email'     => [
                'required',
                'string',
                'lowercase',
                'email:rfc,dns',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'nickname'  => ['required', 'string', 'max:255'],
            'phone'     => ['nullable', 'string', 'max:20'],
            'phone2'    => ['nullable', 'string', 'max:20'],
            'address'   => ['nullable', 'string', 'max:255'],
            'gender'    => ['nullable', 'in:0,1'],
            'isActive'  => ['nullable', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'email.unique' => 'Email sudah ada',
            'email.email'  => 'Email tidak valid, contoh: username@example.com',
        ];
    }
}
