<?php

namespace Api\Models\Common;


Abstract class BaseModel extends AuditModel
{

    private $_prefix = 'Model';

    public function __construct(){
        $this->_initModel();
    }

    abstract public function add_hidden();
    abstract public function add_fillable();

    private function _initModel(){

        $this->_setTable();
        $this->_setPK();

        $this->add_hidden();
        $this->_addHidden();

        $this->add_fillable();
        $this->_addFillable();

    }

    private function _addHidden(){
        $this->addHidden(
            [
                "enabled"
            ]
        );
    }

    public function addFillabel(array $fillabel){
        $this->fillable(
            array_merge(
                $this->fillable,
                is_array($fillabel)?$fillabel:[]
            )
        );
    }

    private function _addFillable(){
        $this->addFillabel(
            [
                "deleted",
                "detail",
                "editable",
                "code",
                "enabled",
                "images",
                "title",
                "visible"
            ]
        );
    }

    /*
     * Set value table with class name
     */
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
