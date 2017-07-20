<?php

namespace Api\Http\Controllers\Access;

use Api\Http\Controllers\Common\BaseController;
use Api\Models\Access\UserModel;

class UserController extends BaseController
{
    protected $search = ['params_1'=>'email','params_2'=>'name'];

    public function __construct(){
        parent::__construct(UserModel::class);//TODO:add request
    }

}