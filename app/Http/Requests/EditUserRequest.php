<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'editcomplete'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'tel_number' => ['nullable', 'string', 'regex:/^[0-9-]{10,13}$/', 'min:10', 'max:13'],
            'image_url' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:200'],
            'profile' => ['nullable', 'string', 'max:200'],
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'     => '名前は必ず入力してください。',
            'name.max:50'       => '名前は50文字以内で入力してください。',
            'email.required'    => 'メールアドレスは必ず入力してください。',
            'email.email'       => '有効なメールアドレスを入力してください。',
            'email.max:50'      => 'メールアドレスは50文字以内で入力してください。',
            'tel_number.regex:/^[0-9-]{10,13}$/' => '電話番号は数字もしくは-で記入してください。',
            'tel_number.min:10' => '電話番号は10文字以上13文字以内で入力してください。',
            'tel_number.max:13' => '電話番号は10文字以上13文字以内で入力してください。',
            'image_url.max:200' => '画像URLは200文字以内としてください。',
            'profile.max:200'   => 'プロフィールは200文字以内で入力してください。',
        ];
    }
}
