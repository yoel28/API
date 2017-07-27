<?php

namespace Api\Http\Requests\Access;

use Api\Http\Requests\Utils\BaseRequest;

class PermissionRequest extends BaseRequest
{
    public function rules()
    {
        return array_merge(
            [
                'module' => 'required|max:100',
                'action' => 'required|max:100',
                'controller' => 'required|max:100'
            ],
            $this->getRules()
        );
    }

}
