<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL0-9\s]*$/u|max:255|min:10',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required',
            'content' => 'required',
            'product_photo_path' => 'required|mimes:jpg,jpeg,png|max:20480',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không vượt quá 255 ký tự',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.min' => 'Tên không dưới 10 ký tự',
            'category_id.required' => 'Danh mục không được để trống',
            'publisher_id.required' => 'Nhà xuất bản không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'product_photo_path.mimes' => 'Ảnh phải có định dạng JPG, JPEG hoặc PNG',
            'product_photo_path.max' => 'Ảnh không được quá 20MB',
        ];
    }
}
