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
Route::post('order', 'ServiceController@create_order');

Route::group(['prefix' => 'backend', 'namespace' => 'backend'], function($backend){
    $backend->get('/', 'PageController@index');
    
    $backend->get('/login', 'AdminController@login');
    $backend->get('/register', 'AdminController@register');
    
    $backend->get('/albums', 'PageController@backend_list_album');
    $backend->get('/albums/add', 'PageController@backend_add_album');
    $backend->get('/albums/edit/{id}', 'PageController@backend_edit_album')->where('id', '[0-9]+');
    $backend->post('/albums/delete/{id}', 'PageController@backend_delete_album')->where('id', '[0-9]+');
    
    $backend->get('/services', 'PageController@backend_list_service');
    $backend->get('/services/add', 'PageController@backend_add_service');
    $backend->get('/services/edit/{id}', 'PageController@backend_edit_service')->where('id', '[0-9]+');
    $backend->post('/services/delete/{id}', 'PageController@backend_delete_service')->where('id', '[0-9]+');
    
    $backend->get('/news', 'PageController@backend_list_news');
    $backend->get('/news/add', 'PageController@backend_add_news');
    $backend->get('/news/edit/{id}', 'PageController@backend_edit_news')->where('id', '[0-9]+');
    $backend->post('/news/delete/{id}', 'PageController@backend_delete_news')->where('id', '[0-9]+');
    
    $backend->get('/orders', 'PageController@backend_list_order');
    $backend->get('/orders/edit/{id}', 'PageController@backend_edit_order')->where('id', '[0-9]+');
});
