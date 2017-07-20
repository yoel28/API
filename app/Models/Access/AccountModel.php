<?php

namespace Api\Models\Access;

use Api\Models\Common\BaseModel;

class AccountModel extends BaseModel
{
    protected $fillable = ["address", "contact", "email", "favicon", "hostname",
        "icon", "max_user_count", "message", "name", "phone", "preferences", "url"];

    protected $hidden = ['account_id'];

    public function rules()
    {
        return $this->hasMany(\Api\Models\Business\RuleModel::class,'account_id','account_id');
    }
}