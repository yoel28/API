<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;

class RoleModel extends BaseModel
{

    protected $appends = ['permissions'];
    protected $hidden = ['role_id','images'];

    //TODO: add associate permissions
    protected function getPermissionsAttribute(){

    }


}
