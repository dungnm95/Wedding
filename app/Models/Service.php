<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Service {

    public static function insertService($param) {
        return DB::table('services')->insert($param);
    }

    public static function listService() {
        return DB::table('services')->get();
    }

    public static function infoService($id) {
        return DB::table('services')->where('id', $id)->first();
    }

    public static function updateService($id, $param) {
        return DB::table('services')->where('id', $id)->update($param);
    }

    public static function deleteService($id) {
        DB::table('services')->where('id', $id)->delete();
    }

}
