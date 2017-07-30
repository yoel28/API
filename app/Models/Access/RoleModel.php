<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class RoleModel extends BaseModel
{

    protected $appends = ['permissions'];
    protected $hidden = ['id','images'];

    public function getPermissionsAttribute():Collection{
        return $this->permissions()->get()->pluck('code');
    }

    public function permissions():BelongsToMany{
        return $this->belongsToMany(
            PermissionModel::class,
            'permission_role',
            'role_id',
            'permission_id'
        );
    }


}
