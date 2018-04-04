<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use App\Models\Admin;
use Illuminate\Support\MessageBag;

class AdminController extends Controller {

    public function login() {
        return view('backend.login');
    }

    public function check_login(Request $request) {
        $rules = [
            'username' => 'required',
            'password' => 'required|min:6'
        ];
        $messages = [
            'username.required' => 'Username là trường bắt buộc',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return json_encode(['success' => false, 'message' => $validator->errors()->first()]);
        } else {
            $username = $request->input('username');
            $password = md5($request->input('password'));

            $find_admin = Admin::check_exist_admin($username);
            if ($find_admin) {
                $check_login = Admin::check_login([
                            'username' => $username,
                            'password' => $password,
                ]);
                if ($check_login) {
                    Admin::add_log([
                        'admin_id' => $check_login->id,
                        'admin_username' => $username,
                        'action' => 'Đăng nhập thành công',
                        'time' => time() 
                    ]);
                    $request->session()->put('username', $username);
                    $request->session()->put('admin_id', $check_login->id);
                    $request->session()->put('admin_name', $check_login->name);
                    return json_encode(['success' => true, 'message' => 'Đăng nhập thành công']);
                } else {
                    return json_encode(['success' => false, 'message' => 'Mật khẩu không đúng']);
                }
            } else {
                return json_encode(['success' => false, 'message' => 'Username không đúng']);
            }
        }
    }

    public function register() {
        return view('backend.register');
    }

    public function create_account(Request $request) {
        $rules = [
            'username' => 'required',
            'password' => 'required|min:6'
        ];
        $messages = [
            'username.required' => 'Username là trường bắt buộc',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            var_dump($validator);
            die();
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $username = $request->input('username');
            $name = $request->input('name');
            $password = $request->input('password');
            $find_admin = Admin::check_exist_admin($username);
            if (!$find_admin) {
                $insert = Admin::create_admin([
                            'name' => $name,
                            'username' => $username,
                            'password' => md5($password),
                            'created_time' => time(),
                            'updated_time' => time()
                ]);
                if ($insert) {
                    return json_encode(['success' => true, 'message' => 'Tạo tài khoản thành công']);
                } else {
                    return json_encode(['success' => false, 'message' => 'Tạo tài khoản thất bại']);
                }
            } else {
                return json_encode(['success' => false, 'message' => 'Tài khoản đã tồn tại']);
            }
        }
    }
    public function check_log() {
        $data = Admin::getlog();
        return view('backend.list_admin_logs')->with(['logs' => $data]);
    }

}
