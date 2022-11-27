<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimelineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'timeline' || $this->path() == ''){
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
            'tweet' => ['string', 'required', 'max:140'],
            'image_url' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:200'],
        ];
    }

    public function messages()
    {
        return [
            'tweet.string'    => 'ツイートは文字列で入力してください。',
            'tweet.required'    => 'ツイートは必ず入力してください。',
            'tweet.max'     => 'ツイートは140文字以内で入力してください。',
            'image_url.max:200' => '画像URLは200文字以内としてください。',
        ];
    }

}
