<?php

namespace Api\Models\Common;

use Illuminate\Database\Eloquent\Model;

class AuditModel extends Model
{
    protected $fillable = ['ip', 'user_agent','created_at','updated_at','deleted_at'];
    protected $hidden = ['ip', 'user_agent','created_at','updated_at','deleted_at'];
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function addFillabel(array $fillabel){
        $this->fillable(array_merge($this->fillable, $fillabel));
    }


}