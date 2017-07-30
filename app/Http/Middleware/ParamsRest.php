<?php

namespace Api\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ParamsRest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \DB::enableQueryLog();
        $request['rest'] = $this->loadRest($request);
        if(\Auth::user()->hasPermission(Route::getCurrentRoute()->getActionName())){
            return $next($request);
        }
        return response('Unauthorized',401);
    }

    public function terminate($request, $response){
        \Log::info('query:\n'.json_encode(\DB::getQueryLog()));
//        dd(\DB::getQueryLog());
    }

    private function loadRest(Request $request):array {
        $params=[];

        $params['max'] = $request->query('max','15');
        $params['max'] = is_numeric($params['max'])?abs(+$params['max']):15;

        $params['offset'] = $request->query('offset','0');
        $params['offset'] = is_numeric($params['offset'])?abs(+$params['max']):0;

        $params['order'] = $request->query('order','desc');
        $params['sort'] = $request->query('sort','id');
        $params['where'] = json_decode($request->query('where','[]'));

        return $params;
    }

}
