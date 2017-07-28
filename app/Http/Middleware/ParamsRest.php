<?php

namespace Api\Http\Middleware;

use Closure;

class ParamsRest
{
    private $params = [
        'max'=>15,
        'order'=>'desc',
        'sort'=>'id',
        'offset'=>0,
        'where'=>[]
    ];

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
        $this->params['max'] = $request->query('max','15');
        $this->params['max'] = is_numeric($this->params['max'])?abs(+$this->params['max']):15;

        $this->params['offset'] = $request->query('offset','0');
        $this->params['offset'] = is_numeric($this->params['offset'])?abs(+$this->params['max']):0;

        $this->params['order'] = $request->query('order','desc');
        $this->params['sort'] = $request->query('sort','id');
        $this->params['where'] = json_decode($request->query('where','[]'));

        $request['rest'] = $this->params;

        return $next($request);
    }

    public function terminate($request, $response){
        \Log::info('query:\n'.json_encode(\DB::getQueryLog()));
    }

}
