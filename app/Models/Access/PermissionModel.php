<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class PermissionModel extends BaseModel
{
    protected $fillable = ['module','controller','action'];
    protected $hidden = ['id','images'];

    protected $appends = ['roles'];

    protected function roles():BelongsToMany{
        return $this->belongsToMany(
            RoleModel::class,
            'permission_role',
            'permission_id',
            'role_id'
        );
    }
    protected function getRolesAttribute():Collection{
        return $this->roles()->get()->pluck('code');
    }



}
