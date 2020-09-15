<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        //buat rules untuk validasi update profile
        return [
            'username' => [
                'required', 'string', 'max:255',
                Rule::unique('users', 'username')->ignore(Auth::user()->id)
            ],
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
