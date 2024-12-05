<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            // 'firstName' => 'required',
            // 'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'payment_type' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            // 'firstName.required' => 'Họ bắt buộc nhập!',
            // 'lastname.required' => 'Tên bắt buộc nhập!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Số điện thoại bắt buộc nhập!',
            'phone.numeric' => 'Số điện thoại phải là số!',
            'phone.min' => 'Số điện thoại tối thiểu 10 số!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
            'payment_type.required' => 'VUi lòng chọn loại thanh toán'
        ];
    }
}
