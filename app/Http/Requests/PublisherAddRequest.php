<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|alpha_num|unique:sliders|max:255',
            'description' => 'required',
            'photo_path' => 'required',
             
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không vượt quá 255 ký tự', 
            'name.alpha_num' => 'Tên chỉ được bao gồm các ký tự chữ cái và số',
            'description.required' => 'Mô tả không được để trống',  
            'photo_path.required' => 'Hình ảnh không được để trống',
           
        ];
    }
}
