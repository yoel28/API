<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RoleModel extends BaseModel
{

    protected $appends = ['permissions'];
    protected $hidden = ['id','images'];

    protected function getPermissionsAttribute(){
        return $this->permissions()->get([])->map(function ($data) {
            return $data['pivot']['permission_id'];
        });
    }
    protected function permissions():BelongsToMany{
        return $this->belongsToMany(
            PermissionModel::class,
            'permission_role',
            'role_id',
            'permission_id'
        );
    }


}
