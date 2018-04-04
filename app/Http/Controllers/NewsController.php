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

class NewsController extends Controller {

    public function listNews() {
        $news = News::NewsPagination();
        return view('news')->with(['news'=>$news]);
    }

    public function newsDetail($id) {
        $news = News::infoNews($id);
        //update count view
        $count_view = (int) $news->count_view;
        News::updateNews($id, ['count_view' => $count_view+1]);
        
        $newNew = News::getNewNews();
        return view('news_detail')->with(['news'=>$news,'new_item' => $newNew]);
    }

}
