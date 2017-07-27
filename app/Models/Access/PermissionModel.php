<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    protected function getRolesAttribute(){
        return $this->roles()->get([])->map(function ($data) {
            return $data['pivot']['role_id'];
        });
    }



}
