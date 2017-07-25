<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;

class RoleModel extends BaseModel
{
    //TODO: ADD relationship role-user
    //TODO: ADD relationship role-permissions

    protected $appends = ['users','permissions'];
    protected $hidden = ['role_id','images'];

    protected function getUsersAttribute(){

    }

    protected function getPermissionsAttribute(){

    }
}
