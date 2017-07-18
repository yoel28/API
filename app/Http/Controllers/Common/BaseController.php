<?php

namespace Api\Http\Controllers\Common;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    private $_model;
    private $_request;

    public function __construct($model,$request=null){//TODO:add request default
        $this->_model =  $model;
        if($request)
            $this->_request =  new $request;
    }

    protected function index(Request $req){
//        var_dump($request->query('max','max'));
        return  response()->json(
            ['list'=>$this->_model::all()],
            200
        );
    }

    protected function store(Request $req)
    {
        if (!is_array($req->all())) {
            return response()->json(
                ['errors'  => ['request must be an array']],
                422
            );
        }

        try {
            $valid = Validator::make($req->all(), $this->_request->rules());
            if ($valid->fails()) {
                return response()->json(
                    ['errors' => $valid->errors()->all()],
                    422
                );
            }

            $data = $this->_model::create($req->all());
            return response()->json($data, 201);

        }catch (Exception $e) {
            \Log::info('Error creating '.$this->_model.': '.$e);
            return response()->json(
                ['errors' => ['Internal server error']],
                500
            );
        }

    }

    protected function update(Request $req, $id)
    {
        $data = $this->_model::find($id);
        $data->update($req->all());
        return response()->json($data,200);
    }

    protected function destroy($id)
    {
        $this->_model::destroy($id);
        return response()->json(null,200);
    }

    protected function show($id)
    {
        $data = $this->_model::find($id);
        if(!$data){
            return response()->json(
                ['errors'=>['Not found']],
                404
            );
        }
        return response()->json($data,200);
    }

}