<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = request()->route('user');
        return [
            'FirstName' => 'required',
            'LastName' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
            'username' => 'required|unique:users,username,'.$user->id,
        ];
    }
}
