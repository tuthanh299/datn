<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsAddRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL0-9\s]*$/u|unique:sliders|max:255',
            'description' => 'required',
            'content' => 'required',
            'photo_path' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Tên không vượt quá 255 ký tự', 
            'description.required' => 'Mô tả không được để trống',  
            'content.required' => 'Nội không được để trống',  
            'photo_path.required' => 'Hình ảnh không được để trống',
        ];
    }
}
