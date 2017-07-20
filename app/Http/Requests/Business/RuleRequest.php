<?php

namespace Api\Http\Requests\Business;

use Api\Http\Requests\Utils\BaseRequest;

class RuleRequest extends BaseRequest
{

    public function rules()
    {
        return array_merge(
            ['account_id' => 'required|exists:account'],
            $this->getRules()
        );
    }
}
