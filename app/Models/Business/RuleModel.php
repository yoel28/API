<?php

namespace Api\Models\Business;

use Api\Models\Common\BaseModel;


class RuleModel extends BaseModel
{

    public function add_hidden(){
        $this->addHidden(['rule_id']);
    }

    public function add_fillabel(){
        $this->addFillabel(["account_id"]);
    }

    public function account()
    {
        return $this->belongsTo('Api\Models\Access\AccountModel');
    }

}
