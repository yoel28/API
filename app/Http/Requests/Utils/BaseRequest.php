<?php

namespace Api\Http\Requests\Utils;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    protected $_table;
    protected $_prefix = 'Request';

    public function __construct(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null){
        $this->_init();
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    private function _init(){
        $this->_setTable();
    }

    private function _setTable(){
        if(!$this->_table){
            $this->_table = $this->_nameClass();
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

    protected function authorize(){
        return true;
    }

    public function getRules():array{
        return [
            'code'=>'required|max:100|unique:'.$this->_table,
            'title'=>'required|max:100',
            'detail'=>'',
            'images'=>'',
            'editable'=>'',
            'enabled'=>'',
            'visible' =>''
        ];
    }

}
