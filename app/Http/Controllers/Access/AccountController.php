<?php

namespace Api\Http\Controllers\Access;

use Api\Http\Controllers\Common\BaseController;
use Api\Models\Access\AccountModel;

class AccountController extends BaseController
{
    public function __construct(){
        parent::__construct(AccountModel::class);
    }

}