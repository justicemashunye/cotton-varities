<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;



require 'admin.php';
Auth::routes();


Route::view('/', 'site.pages.homepage');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/variety/{slug}', 'Site\VarietyController@show')->name('variety.show');

});