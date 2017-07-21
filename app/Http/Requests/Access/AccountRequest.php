<?php

namespace Api\Http\Requests\Access;

use Api\Http\Requests\Utils\BaseRequest;

class AccountRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            [
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
            ],
            $this->getRules()
        );
    }

}
