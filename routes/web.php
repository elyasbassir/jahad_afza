<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_GET;
use App\Http\Controllers\controller_POST;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(controller_GET::class)->group(function (){

    Route::get('/','index')->name('index');
    Route::get('/login','login_user')->name('login_user');
Route::get('/show_product/{id}','show_product')->name('show_product');
Route::get('/owner_admin','owner_admin')->name('owner_admin');
Route::get('/search','search_product')->name('search_product');
});
Route::controller(controller_POST::class)->group(function (){

    Route::post('signIn','signIn')->name('signIn');
    Route::post('signUp','signUp')->name('signUp');
});
