<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

class PageController extends Controller {

    public function index() {
        return view('backend.index');
    }

    public function backend_list_album() {
        return view('backend.list_album');
    }

    public function backend_add_album() {
        return view('backend.add_album');
    }

    public function backend_edit_album($id) {
        return view('backend.edit_album');
    }

    public function backend_delete_album($id) {
        
    }

    public function backend_list_service() {
        return view('backend.list_service');
    }

    public function backend_add_service() {
        return view('backend.add_service');
    }

    public function backend_edit_service($id) {
        return view('backend.edit_service');
    }

    public function backend_delete_service($id) {
        
    }

    public function backend_list_news() {
        return view('backend.list_news');
    }

    public function backend_add_news() {
        return view('backend.add_news');
    }

    public function backend_edit_news($id) {
        return view('backend.edit_news');
    }

    public function backend_delete_news($id) {
        
    }

    public function backend_list_order() {
        return view('backend.list_order');
    }

    public function backend_edit_order($id) {
        return view('backend.edit_order');
    }

    public function backend_list_contact() {
        return view('backend.list_contact');
    }

    public function backend_view_contact($id) {
        return view('backend.view_contact');
    }

}
