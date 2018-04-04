<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Album {

    public static function insertGetId($param) {
        return DB::table('albums')->insertGetId($param);
    }

    public static function insertAlbumDetail($param) {
        return DB::table('album_detail')->insert($param);
    }

    public static function listAlbum() {
        return DB::table('albums')->get();
    }

    public static function infoAlbum($id) {
        return DB::table('albums')->select('id', 'title', 'img','service_id','description')->where('id', $id)->first();
    }
    
    public static function allInfoAlbum($id) {
        return DB::table('albums')->where('id', $id)->first();
    }

    public static function infoAlbumDetail($album_id) {
        return DB::table('album_detail')->where('album_id', $album_id)->get();
    }

    public static function updateAlbuminfo($id, $param) {
        return DB::table('albums')->where('id', $id)->update($param);
    }

    public static function updateAlbumDetailinfo($album_id, $param) {
        DB::table('album_detail')->where('album_id', $album_id)->delete();
        return DB::table('album_detail')->insert($param);
    }

    public static function deleteAlbum($album_id) {
        DB::table('album_detail')->where('album_id', $album_id)->delete();
        DB::table('albums')->where('id', $album_id)->delete();
    }

    public static function getNewAlbum() {
        return DB::table('albums')->orderBy('created_time','desc')->limit(6)->get();
    }
    public static function getAlbumPagination() {
        return DB::table('albums')->orderBy('created_time','desc')->paginate(9);
    }
}
