<?php

namespace Api\Http\Controllers\Access;

use Api\Http\Controllers\Common\BaseController;
use Api\Models\Access\UserModel;

class UserController extends BaseController
{
    protected $keysSearch = ['email','name'];

    public function __construct(UserModel $model){//TODO: Falta el request
        $this->model = $model;
    }

}