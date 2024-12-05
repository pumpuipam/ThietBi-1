<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function rules()
    {
        // key là name của các input, value là các đk
        return [
            'email' => 'required|email|',
            // 'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        // key là key của rule . đk
        return [
            'email.required' => 'Email bắt buộc nhập!',
            'email.email' => 'Email không đúng định dạng!',
            // 'password.required' => 'Mật khẩu bắt buộc nhập!',
            // 'password.min' => 'Mật khẩu tối thiểu 6 ký tự'
        ];
    }
}
