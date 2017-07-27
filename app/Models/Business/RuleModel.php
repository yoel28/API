<?php

namespace Api\Models\Business;

use Api\Models\Utils\BaseModel;
use Api\Traits\OwnerAccount;

class RuleModel extends BaseModel
{
    use OwnerAccount;

    protected $hidden = ['id','images'];

}
