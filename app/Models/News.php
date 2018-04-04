<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class News {

    public static function insertNews($param) {
        return DB::table('news')->insert($param);
    }

    public static function listNews() {
        return DB::table('news')->get();
    }

    public static function infoNews($id) {
        return DB::table('news')->where('id', $id)->first();
    }

    public static function updateNews($id, $param) {
        return DB::table('news')->where('id', $id)->update($param);
    }

    public static function deleteNews($id) {
        DB::table('news')->where('id', $id)->delete();
    }

    public static function getNewNews() {
        return DB::table('news')->orderBy('created_time','desc')->limit(3)->get();
    }
    
    public static function NewsPagination() {
        return DB::table('news')->orderBy('created_time','desc')->paginate(5);
    }
}
