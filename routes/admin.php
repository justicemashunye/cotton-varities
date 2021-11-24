<?php
Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        //////Settings RouteServiceProvider
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        ///// Varieties
        Route::group(['prefix'  =>   'varieties'], function() {

            Route::get('/', 'Admin\VarietyController@index')->name('admin.varieties.index');
            Route::get('/create', 'Admin\VarietyController@create')->name('admin.varieties.create');
            Route::post('/store', 'Admin\VarietyController@store')->name('admin.varieties.store');
            Route::get('/{id}/edit', 'Admin\VarietyController@edit')->name('admin.varieties.edit');
            Route::post('/update', 'Admin\VarietyController@update')->name('admin.varieties.update');
            Route::get('/{id}/delete', 'Admin\VarietyController@delete')->name('admin.varieties.delete');
        });

        // Attributes
        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');
        
        });

        Route::group(['prefix'  =>   'attributevalues'], function() {

            Route::get('/', 'Admin\AttributeValueController@index')->name('admin.attributevalues.index');
            Route::get('/create', 'Admin\AttributeValueController@create')->name('admin.attributevalues.create');
            Route::post('/store', 'Admin\AttributeValueController@store')->name('admin.attributevalues.store');
            Route::get('/{id}/edit', 'Admin\AttributeValueController@edit')->name('admin.attributevalues.edit');
            Route::post('/update', 'Admin\AttributeValueController@update')->name('admin.attributevalues.update');
            Route::get('/{id}/delete', 'Admin\AttributeValueController@delete')->name('admin.attributevalues.delete');
        
        });



    });

});