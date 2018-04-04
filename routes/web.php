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

Route::get('/', 'AlbumController@home');
Route::get('galleries', 'AlbumController@albums');
Route::get('gallery-detail/{id}', 'AlbumController@album_detail');
Route::get('news', 'NewsController@listNews');
Route::get('news-detail/{id}', 'NewsController@newsDetail');
Route::any('contact', 'ServiceController@contact');
Route::get('pricing/{id}', 'ServiceController@pricing')->where('id', '[0-9]+');
Route::any('choose_package/{id}', 'ServiceController@choose_package')->where('id', '[0-9]+');
Route::get('services', 'ServiceController@list_services');
Route::post('order', 'ServiceController@create_order');

Route::group(['middleware' => 'web','prefix' => 'backend', 'namespace' => 'backend'], function($backend){
    $backend->get('/', 'PageController@index');
    
    $backend->get('/login', 'AdminController@login');
    $backend->get('/register', 'AdminController@register');
    $backend->post('/create_account', 'AdminController@create_account');
    $backend->post('/check_login', 'AdminController@check_login');
    $backend->get('/check_log', 'AdminController@check_log');
    
    $backend->get('/albums', 'PageController@backend_list_album');
    $backend->any('/albums/add', 'PageController@backend_add_album');
    $backend->any('/albums/edit/{id}', 'PageController@backend_edit_album')->where('id', '[0-9]+');
    $backend->post('/albums/delete/{id}', 'PageController@backend_delete_album')->where('id', '[0-9]+');
    
    $backend->get('/services', 'PageController@backend_list_service');
    $backend->any('/services/add', 'PageController@backend_add_service');
    $backend->any('/services/edit/{id}', 'PageController@backend_edit_service')->where('id', '[0-9]+');
    $backend->post('/services/delete/{id}', 'PageController@backend_delete_service')->where('id', '[0-9]+');
    
    $backend->get('/pricings', 'PageController@backend_list_pricing');
    $backend->any('/pricings/add', 'PageController@backend_add_pricing');
    $backend->any('/pricings/edit/{id}', 'PageController@backend_edit_pricing')->where('id', '[0-9]+');
    $backend->post('/pricings/delete/{id}', 'PageController@backend_delete_pricing')->where('id', '[0-9]+');
    
    $backend->get('/news', 'PageController@backend_list_news');
    $backend->any('/news/add', 'PageController@backend_add_news');
    $backend->any('/news/edit/{id}', 'PageController@backend_edit_news')->where('id', '[0-9]+');
    $backend->post('/news/delete/{id}', 'PageController@backend_delete_news')->where('id', '[0-9]+');
    
    $backend->get('/orders', 'PageController@backend_list_order');
    $backend->any('/orders/edit/{id}', 'PageController@backend_edit_order')->where('id', '[0-9]+');
    
    $backend->get('/contacts', 'PageController@backend_list_contact');
    $backend->get('/contacts/view/{id}', 'PageController@backend_view_contact')->where('id', '[0-9]+');
    
});
