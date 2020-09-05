<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BlogController@index')->name('home');
Route::get('post/{slug}', 'BlogController@show');
Route::get('post/category/{category}', 'BlogController@category');
Route::get('search', 'BlogController@search');

Route::get('realtime-dashboard', function () {
    return view('realtime-dashboard.index');
});

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/submit', 'ContactController@submit');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
