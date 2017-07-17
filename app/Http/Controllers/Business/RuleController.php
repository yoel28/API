<?php

namespace Api\Http\Controllers\Business;

use Api\Http\Controllers\Common\BaseController;
use Api\Models\Business\RuleModel;


class RuleController extends BaseController
{
    public function __construct(){
        parent::__construct(RuleModel::class);
    }

}