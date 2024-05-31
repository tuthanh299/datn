<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'regex:/^[\pL0-9\s]*$/u', 'max:20' ],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'unique:members'],
            'password' => ['required', 'string', 'min:8'],
            'confirm-password' => ['required', 'string', 'min:8', 'same:password'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
        ];
    }

    public function messages(){
        return [
            'firstname.required' => 'Tên không được để trống',
            'firstname.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'firstname.max' => 'Tên không được vượt quá 20 ký tự',
            'lastname.required' => 'Họ không được để trống',
            'lastname.regex' => 'Họ chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'lastname.max' => 'Họ không được vượt quá 100 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã được sử dụng cho tài khoản khác',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải trên 8 ký tự',
            'confirm-password.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm-password.min' => 'Xác nhận mật khẩu phải trên 8 ký tự',
            'confirm-password.same' => 'Mật khẩu không trùng nhau',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'phone.required' => 'SDT không được để trống',
            'phone.max' => 'SDT không được vượt quá 10 ký tự',
        ];
    }
}
