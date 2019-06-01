<?php

Route::namespace('Home')->prefix('/')->group(function(){
    Route::get('/', 'HomeController@show');
});

Auth::routes(['register' => false]);

Route::namespace('Dashboard')->prefix('/dashboard')->middleware(['auth'])->group(function(){
    Route::get('/', 'DashboardController@show');
});

Route::namespace('Account')->prefix('/account')->middleware(['auth'])->group(function(){
    Route::namespace('User')->prefix('/user')->group(function(){
        Route::get('/', 'UserController@edit');
        Route::patch('/', 'UserController@update');
    });
});

Route::namespace('Manage')->prefix('/manage')->middleware(['auth'])->group(function(){
    Route::namespace('Users')->prefix('/user')->group(function(){
        Route::get('/', 'UserController@index');
        Route::post('/', 'UserController@store');
        Route::prefix('/{userId}')->group(function(){
            Route::get('/', 'UserController@show');
            Route::patch('/', 'UserController@update');
            Route::delete('/', 'UserController@destroy');
        });
    });
    Route::namespace('Rules')->prefix('/rule')->group(function(){
        Route::get('/', 'RuleController@index');
        Route::post('/', 'RuleController@store');
        Route::prefix('/{ruleKey}')->group(function(){
            Route::get('/edit', 'RuleController@edit');
            Route::patch('/', 'RuleController@update');
            Route::delete('/', 'RuleController@destroy');
            Route::namespace('Locations')->prefix('/location')->group(function(){
                Route::get('/', 'LocationController@index');
                Route::post('/', 'LocationController@store');
                Route::prefix('/{locationKey}')->group(function(){
                    Route::delete('/', 'LocationController@destroy');
                });
            });
        });
    });
    Route::namespace('Availability')->prefix('/availability')->group(function(){
        Route::get('/', 'AvailabilityController@index');
        Route::get('/create', 'AvailabilityController@create');
        Route::post('/', 'AvailabilityController@store');
        Route::prefix('/{availabilityEventKey}')->group(function(){
            Route::get('/edit', 'AvailabilityController@edit');
            Route::patch('/', 'AvailabilityController@update');
            Route::delete('/', 'AvailabilityController@destroy');
        });
    });
});