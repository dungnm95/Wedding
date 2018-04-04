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

class ServiceController extends Controller {

    public function list_services() {
        $services = Service::listService();
        return view('services')->with(['services' => $services]);
    }

    public function pricing($id) {
        $pricings = Service::infoPricingByService($id);
        return view('pricing')->with(['pricings' => $pricings]);
    }

    public function choose_package($pricing_id, Request $request) {
        $pricing = Service::infoPricing($pricing_id);
        $message = [];
        if ($pricing) {
            if ($request->isMethod('post')) {
                $param = [];
                $param['customer_name'] = $request->input('name');
                $param['customer_email'] = $request->input('email');
                $param['customer_phone'] = $request->input('phone');
                $param['message'] = $request->input('message', '');
                $param['pricing_id'] = $pricing_id;
                $param['service_id'] = $pricing->service_id;
                $param['service_name'] = $pricing->service_name;
                $param['amount'] = $pricing->price;
                $param['created_time'] = time();
                $param['updated_time'] = time();
                $save = Service::saveOrder($param);
                if ($save) {
                    $message = ['success' => true, 'message' => 'Bạn đã đặt lịch thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất'];
                } else {
                    $message = ['success' => false, 'message' => 'Đặt lịch thất bại. Bạn vui lòng thực hiện lại!'];
                }
            }
        } else {
            $message = ['success' => false, 'message' => 'Không tìm thấy gói bạn muốn đặt lịch'];
        }
        return view('choose')->with(['pricing' => $pricing, 'message' => $message]);
    }

    public function contact(Request $request) {
        $message = [];
        if ($request->isMethod('post')) {
            $param = [];
            $param['customer_name'] = $request->input('name');
            $param['customer_email'] = $request->input('email');
            $param['customer_phone'] = $request->input('phone');
            $param['message'] = $request->input('message', '');
            $param['created_time'] = time();
            $param['updated_time'] = time();
            $save = Service::saveContact($param);
            if ($save) {
                $message = ['success' => true, 'message' => 'Bạn đã gửi tin nhắn thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất'];
            } else {
                $message = ['success' => false, 'message' => 'Gửi tin nhắn thất bại. Bạn vui lòng thực hiện lại!'];
            }
        }
        return view('contact')->with(['message' => $message]);
    }

}
