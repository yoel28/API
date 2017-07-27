<?php

namespace Api\Models\Utils;

class BaseModel extends AuditModel
{
    protected $_prefix = 'Model';

    public function __construct(array $attributes = []){
        $this->_initModel();
        parent::__construct($attributes);
    }

    private function _initModel(){
        $this->_addHiddenBase();
        $this->_addFillabel();
        $this->_setTable();
    }

    protected function _addHiddenBase(){
        $this->addHidden(["enabled"]); //TODO: Depende de los permisos que disponga el usuario
    }

    private function _addFillabel(){
        $this->addFillabel(
            ["detail", "editable","code","enabled","images","title","visible"]
        );
    }

    private function _setTable(){
        if(!$this->table){
            $this->setTable($this->_nameClass());
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
