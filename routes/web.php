<?php

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

Route::get('/', function () {
    return view('home');
});
Route::get('galleries', function () {
    return view('galleries');
});
Route::get('gallery-detail', function () {
    return view('gallery_detail');
});
Route::get('news', function () {
    return view('news');
});
Route::get('news-detail', function () {
    return view('news_detail');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('pricing', function () {
    return view('pricing');
});
Route::get('services', function () {
    return view('services');
});
