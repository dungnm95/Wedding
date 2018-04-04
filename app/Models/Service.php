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

    public static function list_service_pricing() {
        return DB::table('pricings')->get();
    }

    public static function infoPricing($id) {
        return DB::table('pricings')->where('id', $id)->first();
    }

    public static function infoPricingByService($service_id) {
        return DB::table('pricings')->where('service_id', $service_id)->get();
    }

    public static function insertServicePricing($param) {
        return DB::table('pricings')->insert($param);
    }

    public static function updateServicePricing($id, $param) {
        return DB::table('pricings')->where('id', $id)->update($param);
    }

    public static function deleteServicePricing($id) {
        DB::table('pricings')->where('id', $id)->delete();
    }

    public static function saveOrder($param) {
        return DB::table('orders')->insert($param);
    }
    public static function saveContact($param) {
        return DB::table('contacts')->insert($param);
    }
}
