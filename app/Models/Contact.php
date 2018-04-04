<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact {
    public static function listContacts() {
        return DB::table('contacts')->paginate(10);
    }
    public static function infoContact($id) {
        return DB::table('contacts')->where('id', $id)->first();
    }
    public static function updateContact($id) {
        DB::table('contacts')->where('id', $id)->update(['is_read'=>'yes']);
    }
    
    public static function countUnreadContact() {
        return DB::table('contacts')->where('is_read', 'no')->count();
    }
    
}
