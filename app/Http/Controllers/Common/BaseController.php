<?php

namespace Api\Http\Controllers\Common;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    private $model;

    public function __construct($model){
        $this->model =  $model;
    }

    protected function index(Request $request){
//        var_dump($request->query('max','max'));
        return  response()->json(
            ['list'=>$this->model::all()],
            200
        );
    }

    protected function store(Request $request)
    {
        $data = $this->model::create($request->all());
        return response()->json($data,201);
    }

    protected function update(Request $request, $id)
    {
        $data = $this->model::find($id);
        $data->update($request->all());
        return response()->json($data,200);
    }

    protected function destroy($id)
    {
        $this->model::destroy($id);
        return response()->json(null,200);
    }

    protected function show($id)
    {
        $data = $this->model::find($id);
        if(!$data){
            return response()->json(
                ['errors'=>array(['code'=>404,'message'=>'Not found.'])],
                404
            );
        }
        return response()->json($data,200);
    }
}