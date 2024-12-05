<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true if any user can make this request, otherwise, implement authorization logic here.
    }
    
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ.',
                'errors' => $errors,
            ], 422)
        );
    }
    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            // 'email' => 'required|email|',
            'role_id' => 'nullable|integer',
            'gender' => 'required',
          
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên không được bỏ trống.',
            // 'email.unique' => 'Email không được bỏ trống.',
            'phone.required' => 'Số điện thoại không được bỏ trống.',
            'address.required' => 'Địa chỉ không được bỏ trống.',
            
        ];
    }
}
