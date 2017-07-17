<?php

namespace Api\Http\Controllers\Common;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use DB;


class BaseController extends Controller
{
    private $model;

    public function __construct($model){
        $this->model =  $model;
    }

    protected function index(){
        return [
            'list'=>$this->model::all(),
        ];
    }

    protected function store(Request $request)
    {
        $this->model::create($request->all());
        return ['created' => true];
    }

    protected function update(Request $request, $id)
    {
        $value = $this->model::find($id);
        $value->update($request->all());
        return ['updated' => true];
    }

    protected function destroy($id)
    {
        $this->model::destroy($id);
        return ['deleted' => true];
    }

    protected function show($id)
    {
        return $this->model::find($id);
    }
}