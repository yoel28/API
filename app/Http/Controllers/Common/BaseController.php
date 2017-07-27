<?php

namespace Api\Http\Controllers\Common;
use Api\Events\ActionsEvents;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller{

    protected $model;
    protected $request;


    protected $keysSearch = ['code','title'];

    protected function index(Request $req){
        event(new ActionsEvents('get'));
        $data = $this->model::rest($req->rest);
        return  response()->json(
            [
                'list'=>$data->get(),
                'count'=>$data->count()
            ],
            200
        );
    }

    protected function store(Request $req){

        if (!is_array($req->all())) {
            return response()->json(
                ['errors'  => ['request must be an array']],
                422
            );
        }

        try {
            $valid = Validator::make($req->all(), $this->request->rules());
            if ($valid->fails()) {
                return response()->json(
                    ['errors' => $valid->errors()->all()],
                    422
                );
            }

            $data = $this->model::create($req->all());
            return response()->json($data, 201);

        }catch (Exception $e) {
            \Log::info('Error creating '.$this->model.': '.$e);
            return response()->json(
                ['errors' =>[['Internal server error']]],
                500
            );
        }

    }

    protected function update(Request $req, $id){
        $data = $this->model::findOrFail($id);
        $data->update($req->all());
        return response()->json($data,200);
    }

    protected function destroy($id){
        $this->model::destroy($id);
        return response()->json(null,200);
    }

    protected function show($id){
        $data = $this->model::findOrFail($id);//Use Handler -> ModelNotFoundException
        return response()->json($data,200);
    }


    protected function search(Request $req,$value = ''){

        $data = $this->model::where(
                array_map(function ($key) use ($value){
                    return [$key,'ilike','%'.$value.'%','or'];
                },$this->keysSearch)
            )
            ->rest($req->rest);

        return  response()->json(
            [
                'list'=>$data->get(),
                'count'=>$data->count()
            ],
            200
        );
    }

}