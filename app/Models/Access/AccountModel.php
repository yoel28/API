<?php

namespace Api\Models\Access;

use Api\Models\Common\BaseModel;

class AccountModel extends BaseModel
{
    public function add_hidden(){
        $this->addHidden(['account_id']);
    }

    public function add_fillabel(){
        $this->addFillabel(
            [
                "address",
                "contact",
                "email",
                "favicon",
                "hostname",
                "icon",
                "max_user_count",
                "message",
                "name",
                "phone",
                "preferences",
                "url"
            ]
        );
    }
}