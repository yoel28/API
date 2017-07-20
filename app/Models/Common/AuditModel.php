<?php

namespace Api\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditModel extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function __construct(array $attributes = []){
        $this->_initModel();
        parent::__construct($attributes);
    }

    private function _initModel(){
        $this->_addHiddenAudit();
    }

    protected function _addHiddenAudit(){//TODO: Ocultar dependiendo de los permisos
        $this->addHidden(['ip', 'user_agent','created_at','updated_at','deleted_at']);
    }

    public function addFillabel(array $fillabel){
        $this->fillable(array_merge($this->fillable, $fillabel));
    }


}