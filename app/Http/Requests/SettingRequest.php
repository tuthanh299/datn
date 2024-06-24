<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL0-9\s]*$/u|max:20',
            'description' => 'required|max:255',
            'phone' => 'required|max:10',
            'email' => 'required|max:255|email|unique:users,email',
            'zalo' => 'nullable|max:10',
            'address' => 'required|max:255',
            'fanpage' => 'required|max:255',
            'website' => 'required|max:255',
            'iframe_map' => 'required',
            'logo_path' => 'required|mimes:jpg,png|max:20480',
            'favicon_path' => 'required|mimes:jpg,png|max:20480',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Tên không được vượt quá 20 ký tự',
            'description.required' => 'Email không được để trống',
            'description.max' => 'Email không vượt quá 255 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'email.required' => 'Email không được để trống',
            'email.max' => 'Email không vượt quá 255 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'zalo.required' => 'Số điện thoại không được để trống',
            'zalo.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'fanpage.required' => 'Địa chỉ không được để trống',
            'fanpage.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'website.required' => 'Địa chỉ không được để trống',
            'website.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'iframe_map.required' => 'Địa chỉ không được để trống',
            'photo_path.mimes' => 'Ảnh phải có định dạng JPG, JPEG hoặc PNG',
            'photo_path.max' => 'Ảnh không được quá 20MB',
        ];
    }
}
