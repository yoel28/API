<?php

namespace Api\Models\Business;

use Api\Models\Access\AccountModel;
use Api\Models\Common\BaseModel;


class RuleModel extends BaseModel
{
    protected $fillable = ['account_id'];
    protected $hidden = ['rule_id'];

    public function getAccountIdAttribute($id){
        return AccountModel::find($id,['code','name']);
    }

    public function account(){
        return $this->belongsTo(\Api\Models\Access\AccountModel::class,'account_id','account_id');
    }

}
