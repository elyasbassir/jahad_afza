<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_GET;
use App\Http\Controllers\controller_POST;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(controller_GET::class)->group(function (){

    Route::get('/','index')->name('index');

});
