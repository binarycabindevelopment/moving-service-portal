<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->group(function(){
    Route::namespace('MovingEstimator')->prefix('/moving-estimator')->group(function(){
        Route::namespace('HTML')->prefix('/html')->group(function(){
            Route::get('/create', 'HTMLController@create');
            Route::post('/', 'HTMLController@store');
            Route::get('/{movingEstimatorKey}/edit', 'HTMLController@edit');
        });
    });
});