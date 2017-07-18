<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
function methodsBase():array {
    return ['index', 'search', 'store', 'update', 'destroy', 'show'];
}

Route::pattern('id','\d+');

Route::post('login','Auth\AuthenticateController@Authenticate');
Route::post('validate','Auth\AuthenticateController@getAuthenticatedUser');


Route::group(['middleware' => ['jwt']], function () {
    Route::resource('access/accounts','Access\AccountController',
        ['only' => methodsBase()]
    );
    Route::resource('access/users','Access\UserController',
        ['only' => methodsBase()]
    );

    Route::resource('business/rules','Business\RuleController',
        ['only' => methodsBase()]
    );
});