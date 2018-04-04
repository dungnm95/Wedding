<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order {

    public static function listOrders() {
        return DB::table('orders')->select('id', 'customer_name', 'customer_phone', 'status', 'created_time', 'pricing_name', 'service_name', 'amount')->get();
    }

    public static function orderInfo($id) {
        return DB::table('orders')->where('id', $id)->first();
    }

    public static function saveOrder($id, $param) {
        return DB::table('orders')->where('id', $id)->update($param);
    }

    public static function countNewOrder() {
        return DB::table('orders')->where('status', 'pending')->count();
    }

    public static function countOrder() {
        $start_date = strtotime('01-' . date('m-Y'));
        $end_date = time();
        return DB::table('orders')->where('created_time', '>=', $start_date)
                        ->where('created_time', '<=', $end_date)->count();
    }

    public static function drawRevenueChart() {
        $start_date = strtotime('01-' . date('m-Y'));
        $end_date = time();
        $data = [];
        $date = $start_date; $i = 0;
        while ($date <= $end_date){
            $day = date('Y-m-d',$date);
            $data[$i]['label'] = $day;
            $data[$i]['value'] = 0;
            $date +=86400; $i++;
        }
        $query = DB::table("orders")->select('id', 'amount', DB::raw("date_format(from_unixtime(created_time),'%Y-%m-%d') as date"));
        $query->where("status", "success")->where("created_time", '>=', $start_date)->where("created_time", '<=', $end_date);
        $r = $query->get();
        
        if (!$r->isEmpty()) {
            foreach ($r as $value) {
                foreach ($data as $key => $d) {
                    if($d['label'] == $value->date){
                        $data[$key]['value'] += (int) $value->amount;
                        break;
                    }
                }
            }
        } 
        return $data;
    }
    public static function drawOrderChart() {
        $start_date = strtotime('01-' . date('m-Y'));
        $end_date = time();
        $data = [];
        $date = $start_date; $i = 0;
        while ($date <= $end_date){
            $day = date('Y-m-d',$date);
            $data[$i]['label'] = $day;
            $data[$i]['success'] = 0;
            $data[$i]['pending'] = 0;
            $data[$i]['cancel'] = 0;
            $date +=86400; $i++;
        }
        $query = DB::table("orders")->select(DB::raw("COUNT(*) as success"), DB::raw("date_format(from_unixtime(created_time),'%Y-%m-%d') as date"));
        $query->where("status", "success")->where("created_time", '>=', $start_date)->where("created_time", '<=', $end_date);
        $r = $query->groupBy('date')->get();
        
        if (!$r->isEmpty()) {
            foreach ($r as $value) {
                foreach ($data as $key => $d) {
                    if($d['label'] == $value->date){
                        $data[$key]['success'] += $value->success;
                        break;
                    }
                }
            }
        } 
        $query = DB::table("orders")->select(DB::raw("COUNT(*) as pending"), DB::raw("date_format(from_unixtime(created_time),'%Y-%m-%d') as date"));
        $query->where("status", "pending")->where("created_time", '>=', $start_date)->where("created_time", '<=', $end_date);
        $r = $query->groupBy('date')->get();
        
        if (!$r->isEmpty()) {
            foreach ($r as $value) {
                foreach ($data as $key => $d) {
                    if($d['label'] == $value->date){
                        $data[$key]['pending']+=$value->pending;
                        break;
                    }
                }
            }
        } 
        $query = DB::table("orders")->select(DB::raw("COUNT(*) as cancel"), DB::raw("date_format(from_unixtime(created_time),'%Y-%m-%d') as date"));
        $query->where("status", "cancel")->where("created_time", '>=', $start_date)->where("created_time", '<=', $end_date);
        $r = $query->groupBy('date')->get();
        
        if (!$r->isEmpty()) {
            foreach ($r as $value) {
                foreach ($data as $key =>  $d) {
                    if($d['label'] == $value->date){
                        $data[$key]['cancel']+=$value->cancel;
                        break;
                    }
                }
            }
        } 
        return $data;
    }

    public static function sumAmountOrder() {
        $total = 0;
        $start_date = strtotime('01-' . date('m-Y'));
        $end_date = time();
        $orders = DB::table('orders')->select('id', 'amount')
                        ->where('status', 'success')
                        ->where('created_time', '>=', $start_date)
                        ->where('created_time', '<=', $end_date)->get();
        if (!empty($orders)) {
            foreach ($orders as $order) {
                $total += (int) $order->amount;
            }
        }
        return $total;
    }

}
