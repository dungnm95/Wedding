<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Models\Service;
use App\Models\Admin;
use App\Models\News;

class AlbumController extends Controller{
    public function home() {
        $data['albums'] = Album::getNewAlbum();
        $data['news'] = News::getNewNews();
        return view('home')->with($data);
    }
    public function albums() {
        $albums = Album::getAlbumPagination();
        return view('galleries')->with(['albums' => $albums]);
    }
    public function album_detail($id) {
        //get album detail
        $data['album'] = Album::allInfoAlbum($id);
        $data['album_detail'] = Album::infoAlbumDetail($id);
        //update count view
        $count_view = (int) $data['album']->count_view;
        Album::updateAlbuminfo($id, ['count_view' => $count_view+1]);
        return view('gallery_detail')->with($data);
    }
}
