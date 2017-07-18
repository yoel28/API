<?php

namespace Api\Http\Requests\Access;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "address" => "required|max:150",
            "contact" => "max:100",
            "email" => "required|max:100|unique:account|email",
            "favicon" => "mimes:jpeg,bmp,png",
            "hostname" => "required|max:150",
            "icon" => "mimes:jpeg,bmp,png",
            "max_user_count" => "required|numeric|min:1",
            "message" => "",
            "name" => "required|max:100",
            "phone" => "max:20",
            "url" => "max:150",
            "preferences" => ""
        ];
    }
}
