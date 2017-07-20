<?php

namespace Api\Http\Controllers\Access;

use Api\Http\Controllers\Common\BaseController;
use Api\Http\Requests\Access\AccountRequest;
use Api\Models\Access\AccountModel;

class AccountController extends BaseController
{
    public function __construct(AccountModel $model){
        $this->model = $model;
        $this->request = new AccountRequest;
    }

}