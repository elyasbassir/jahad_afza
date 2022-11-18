<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_GET;
use App\Http\Controllers\controller_POST;

Route::controller(controller_GET::class)->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/login', 'login_user')->name('login_user');
    Route::get('/show_product/{id}', 'show_product')->name('show_product');
    Route::get('/owner_admin', 'owner_admin')->name('owner_admin');
    Route::get('/search', 'search_product')->name('search_product');
    Route::get('/add_new_post','add_new_post')->name('add_new_post');

    Route::get('/logout','logout')->name('logout');

    Route::get('/my_order','my_order')->name('my_order');

});
Route::controller(controller_POST::class)->group(function () {
    Route::post('signIn', 'signIn')->name('signIn');
    Route::post('signUp', 'signUp')->name('signUp');
    Route::post('/post/add_new_post','post_add_new_post')->middleware('auth')->name('post_add_new_post');
    Route::POST('/post/delete_order','delete_order')->name('delete_order');
});
