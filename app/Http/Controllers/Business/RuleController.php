<?php

namespace Api\Http\Controllers\Business;

use Api\Http\Controllers\Common\BaseController;
use Api\Http\Requests\Business\RuleRequest;
use Api\Models\Business\RuleModel;


class RuleController extends BaseController
{
    public function __construct(RuleModel $model){
        $this->model =  $model;
        $this->request = new RuleRequest;
    }

}