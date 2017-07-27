<?php

namespace Api\Models\Access;

use Api\Models\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    use Notifiable;
    use Authenticatable, Authorizable, CanResetPassword;

    protected $fillable = ['name', 'email', 'password','account_id'];
    protected $hidden = ['id','password', 'remember_token','account_id'];
    protected $appends = ['roles','account'];

    protected function account():BelongsTo{
        return $this->belongsTo(
            AccountModel::class,
            'account_id',
            'id'
        );
    }
    protected function getAccountAttribute(){
        return $this->account()->get(['code','title'])[0];
    }

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
