<?php

namespace Api\Models\Common;


Abstract class BaseModel extends AuditModel
{
    private $_prefix = 'Model';

    public function __construct(array $attributes = []){
        $this->_initModel();
        parent::__construct($attributes);
    }

    abstract public function add_hidden();
    abstract public function add_fillabel();

    private function _initModel(){

        $this->_setTable();
        $this->_setPK();

        $this->_addHidden();
        $this->add_hidden();

        $this->_addFillabel();
        $this->add_fillabel();

    }

    private function _addHidden(){
        $this->addHidden(["enabled"]);
    }

    private function _addFillabel(){
        $this->addFillabel(
            ["deleted", "detail", "editable","code","enabled","images","title","visible"]
        );
    }

    private function _setTable(){
        if(!$this->table){
            $this->setTable($this->_nameClass());
        }
    }

    private function _setPK(){
        if($this->primaryKey == 'id'){
            $this->primaryKey = $this->_nameClass() . '_id';
        }
    }

    private function _nameClass():string {
        return
            strtolower(
                str_replace(
                    $this->_prefix, '',
                    substr(get_called_class(), strrpos(get_called_class(), '\\') + 1)
                )
            );
    }

}
