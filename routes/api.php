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
    return ['index', 'store', 'update', 'destroy', 'show'];
}

Route::pattern('id','\d+');


Route::group(['prefix' => 'auth'], function () {
    Route::post('login','Auth\AuthenticateController@Authenticate');
    Route::post('validate','Auth\AuthenticateController@getAuthenticatedUser');
    Route::post('refresh', ['middleware' => ['jwt.refresh'], function() {
        $user = JWTAuth::parseToken()->toUser();
        return Response::json(compact('user'));
    }]);
});

Route::group(['middleware' => ['jwt.auth','params.rest']], function () {

    Route::group(['prefix' => 'access'], function () {
        Route::resource('accounts','Access\AccountController',
            ['only' => methodsBase()]
        );
        Route::resource('permissions','Access\PermissionController',
            ['only' => methodsBase()]
        );
        //TODO: resource role.user
        Route::resource('roles','Access\RoleController',
            ['only' => methodsBase()]
        );
        Route::resource('users','Access\UserController',
            ['only' => methodsBase()]
        );

        Route::group(['prefix' => 'search'], function () {
            Route::get('accounts/{value?}', 'Access\AccountController@search');
            Route::get('permissions/{value?}', 'Access\PermissionController@search');
            Route::get('roles/{value?}', 'Access\RoleController@search');
            Route::get('users/{value?}', 'Access\UserController@search');
        });
    });

    Route::group(['prefix' => 'business'], function () {
        Route::resource('rules','Business\RuleController',
            ['only' => methodsBase()]
        );

        Route::group(['prefix' => 'search'], function () {
            Route::get('rules/{value?}', 'Business\RuleController@search');
        });
    });
});