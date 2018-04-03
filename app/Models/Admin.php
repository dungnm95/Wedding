<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin {
    public static function check_exist_admin($username) {
        $query = DB::table('admins')->where('username',$username)->first();
        if($query){
            return 1;
        } else {
            return 0;
        }
    }
    public static function check_login($param) {
        return DB::table('admins')->select('id', 'username', 'name')->where($param)->first();
        
    }
    public static function create_admin($param) {
        return DB::table('admins')->insert($param);
    }
    
    public static function add_log($param) {
        return DB::table('admin_logs')->insert($param);
    }
}
