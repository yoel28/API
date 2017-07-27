<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;
use Api\Traits\OwnerAccount;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserModel extends BaseModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Notifiable,OwnerAccount;
    use Authenticatable, Authorizable, CanResetPassword;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['id','password', 'remember_token'];
    protected $appends = ['roles'];

    protected function roles():BelongsToMany{
        return $this->belongsToMany(
            RoleModel::class,
            'user_role',
            'user_id',
            'role_id'
        );
    }
    protected function getRolesAttribute(){
        return $this->roles()->get([])->map(function ($data) {
            return $data['pivot']['role_id'];
        });
    }

}
