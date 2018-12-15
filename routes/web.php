<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return [
        'info'=>'public root',
        'version'=>'V1'

    ];
});

Route::get('/', function () {
    return [
        'info'=>'public root',
        'version'=>'V1'

    ];
});


// Route::group(['prefix' => '/', 'middleware' => 'cors'], function ($router) {
//     $router->post('/', function () {
//         return [
//             'info'=>'public root',
//             'version'=>'V2'
    
//         ];
//     });
// });

Route::options('/', ['middleware' => 'cors', function()
{
    return \Response::json([], 200);
}]);

Route::post('/', ['middleware' => 'cors', function()
{
    return \Response::json([], 200);
}]);


// Route::match(['options', 'post'], '/', function () {
//     return [
//         'info'=>'public root',
//         'version'=>'V2'
//     ];
// })->middleware('cors');

