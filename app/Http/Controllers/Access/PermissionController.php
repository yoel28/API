<?php

namespace Api\Http\Controllers\Access;

use Api\Http\Controllers\Common\BaseController;
use Api\Http\Requests\Access\PermissionRequest;
use Api\Models\Access\PermissionModel;


class PermissionController extends BaseController
{
    public function __construct(PermissionModel $model){
        $this->model = $model;
        $this->request = new PermissionRequest;
    }
}
