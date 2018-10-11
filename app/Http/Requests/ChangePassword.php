<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ComparePassword;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required|string|min:6', new ComparePassword(Auth::user()->password)],
            'new_password' => 'required|string|min:6|confirmed|different:old_password',
        ];
    }
}
