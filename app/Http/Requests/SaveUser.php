<?php

namespace App\Http\Requests;

use App\Rules\EndsWith;
use Illuminate\Foundation\Http\FormRequest;

class SaveUser extends FormRequest
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
            'name' => 'required|string|max:255',
            'is_admin' => 'required',
//            'email' => 'required|string|email|max:255|unique:users', -> kalau emailnya gak diupdate = bentrok
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|numeric',
            'address' => ['required', new EndsWith('Street')],
            'profile_picture' => 'image|mimes:jpeg,png,jpg', // -> required dihilangkan karena jika tidak mau update = bentrok
            'dob' => 'required|before:12 years ago',
        ];
    }
}
