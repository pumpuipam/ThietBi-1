<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:3',
            'price' => 'required',
            'description' => 'required',
            'cate_id' => 'required',
            'images' =>
            [
                'image',
                'mimes:jpeg,png,jpg',
                'mimetypes:image/jpeg,image/png',
                'max:2048',
            ],
           
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm bắt buộc nhập!',
            'name.min' => 'Tên tối thiểu 3 ký tự!',
            'price.required' => 'Vui lòng nhập giá sản phẩm!',
            // 'price.gte' => 'Giá phải là số dương không âm',
            // 'discount.gte' => 'Giảm giá phải là số dương không âm',
            // 'quantity.gte' => 'Số lượng phải là số dương không âm',
            'description.required' => 'Vui lòng nhập mô tả!',
            'cate_id.required' => 'Vui lòng chọn danh mục!',
            'images.image' => 'Bắt buộc phải là ảnh!',
            'images.max' => 'Ảnh không được lớn hơn 2MB!',
            // 'image_description.required' => 'Ảnh không được để trống!',
        ];
    }
}
