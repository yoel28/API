<?php

namespace Api\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['ip', 'user_agent','created_at','updated_at','deleted_at'];
    protected $hidden = ['ip', 'user_agent','created_at','updated_at','deleted_at'];
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function addFillabel(array $fillabel){
        $this->fillable(array_merge($this->fillable, $fillabel));
    }


}