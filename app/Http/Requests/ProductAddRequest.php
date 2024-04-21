<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:10',            
            'category_id' => 'required',
            'description' => 'required' ,
            'content' => 'required' ,
            'product_photo_path' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không vượt quá 255 ký tự',
            'name.min' => 'Tên không dưới 10 ký tự', 
            'category_id.required' => 'Danh mục không được để trống',
            'description.required' => 'Mô tả không được để trống', 
            'content.required' => 'Nội dung không được để trống', 
            'product_photo_path.required' => 'Hình ảnh không được để trống',
        ];
    }
}
