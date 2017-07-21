<?php

namespace Api\Http\Controllers\Access;

use Api\Http\Controllers\Common\BaseController;
use Api\Http\Requests\Access\RoleRequest;
use Api\Models\Access\RoleModel;


class RoleController extends BaseController
{
    public function __construct(RoleModel $model){
        $this->model = $model;
        $this->request = new RoleRequest;
    }
}
