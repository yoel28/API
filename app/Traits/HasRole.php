<?php
namespace Api\Traits;


use Api\Models\Access\RoleModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRole{

    protected function roles():BelongsToMany{
        return $this->belongsToMany(
            RoleModel::class,
            'user_role',
            'user_id',
            'role_id'
        );
    }

    protected function getRolesAttribute(){
        return $this->roles()->allRelatedIds()->all();
    }


}