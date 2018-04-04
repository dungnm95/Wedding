<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Models\Service;
use App\Models\Admin;
use App\Models\News;
use App\Models\Order;
use App\Models\Contact;
use Session;

class PageController extends Controller {

    protected $unread_mess;
    protected $new_order;

    public function __construct() {
        if (!Session::has('username') || !Session::has('admin_id') || !Session::has('admin_name')) {
            return redirect('/backend/login')->send();
        }
        $this->unread_mess = Contact::countUnreadContact();
        $this->new_order = Order::countNewOrder();
    }

    public function index() {
        $data = ['new_contact' => $this->unread_mess, 'new_order' => $this->new_order];
        $data['total_amount'] = Order::sumAmountOrder();
        $data['total_order'] = Order::countOrder();
        $data['revenue_chart'] = json_encode(Order::drawRevenueChart());
        $data['order_chart'] = json_encode(Order::drawOrderChart());
        return view('backend.index')->with($data);
    }

    public function backend_list_album() {
        $list_album = Album::listAlbum();
        return view('backend.list_album')->with(['albums' => $list_album, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_add_album(Request $request) {
        $data = [];
        $data['services'] = Service::listService();
        $data['new_contact'] = $this->unread_mess;
        $data['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['title'] = $request->input('title');
            $param['service_id'] = $request->input('service_id');
            $param['description'] = $request->input('description');
            foreach ($data['services'] as $service) {
                if ($param['service_id'] == $service->id) {
                    $param['service_name'] = $service->name;
                    break;
                }
            }

            $photo = self::locdau($request->img->getClientOriginalName());
            $file = $request->img;
            $path_upload = 'uploads/albums/';
            if (!is_dir('./' . $path_upload)) {
                mkdir('./' . $path_upload, 0777, true);
            }
            $path = $file->move($path_upload, $photo);
            $param['img'] = $path;
            $param['admin_created'] = $request->session()->get('username');
            $param['created_time'] = time();
            $param['updated_time'] = time();
            //save in to db albums
            $album_id = Album::insertGetId($param);

            $detail = [];
            $idx = 0;
            foreach ($request->detail['type'] as $type) {
                $detail[$idx]['album_id'] = $album_id;
                $detail[$idx]['type'] = $type;
                if ($type == 'img') {
                    $file = $request->detail['img'][$idx];
                    $photo = self::locdau($file->getClientOriginalName());
                    $path = $file->move($path_upload, $photo);

                    $detail[$idx]['img'] = $path;
                    $detail[$idx]['video_link'] = '';
                } elseif ($type == 'video') {
                    $detail[$idx]['img'] = '';
                    $link = explode('=', $request->detail['video'][$idx]);
                    $detail[$idx]['video_link'] = $link[1];
                }
                $idx++;
            }
            $result = Album::insertAlbumDetail($detail);
            if ($result) {
                $data['message'] = ['success' => true, 'message' => 'Tạo album mới thành công'];
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Tạo album mới có ID = ' . $album_id,
                    'time' => time()
                ]);
            } else {
                $data['message'] = ['success' => false, 'message' => 'Tạo album mới thất bại'];
            }
        }
        return view('backend.add_album')->with($data);
    }

    public function backend_edit_album($id, Request $request) {

        $albums['info'] = Album::infoAlbum($id);
        $albums['detail'] = Album::infoAlbumDetail($id);
        $albums['services'] = Service::listService();
        $albums['message'] = [];
        $albums['new_contact'] = $this->unread_mess;
        $albums['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $path_upload = 'uploads/albums/';
            if (isset($request->img)) {
                $photo = self::locdau($request->img->getClientOriginalName());
                $file = $request->img;
                $path = $file->move($path_upload, $photo);
                $param['img'] = $path;
            }
            $param['description'] = $request->input('description');
            $param['service_id'] = $request->input('service_id');
            foreach ($albums['services'] as $service) {
                if ($param['service_id'] == $service->id) {
                    $param['service_name'] = $service->name;
                    break;
                }
            }
            $param['title'] = $request->input('title');
            $param['updated_time'] = time();
            Album::updateAlbuminfo($id, $param);
            $detail = [];
            $idx = 0;
            foreach ($request->detail['type'] as $type) {
                $detail[$idx]['album_id'] = $id;
                $detail[$idx]['type'] = $type;
                if ($type == 'img') {
                    $path = '';
                    if (isset($request->detail['img'][$idx])) {
                        $file = $request->detail['img'][$idx];
                        $photo = self::locdau($file->getClientOriginalName());
                        $path = $file->move($path_upload, $photo);
                    } else {
                        $key = (int) $request->detail['id'][$idx];
                        foreach ($albums['detail'] as $value) {
                            if ($value->id == $key) {
                                $path = $value->img;
                                break;
                            }
                        }
                    }
                    $detail[$idx]['img'] = $path;
                    $detail[$idx]['video_link'] = '';
                } elseif ($type == 'video') {
                    $detail[$idx]['img'] = '';
                    $link = explode('=', $request->detail['video'][$idx]);
                    $detail[$idx]['video_link'] = $link[1];
                }
                $idx++;
            }
            $update = Album::updateAlbumDetailinfo($id, $detail);
            if ($update) {
                $albums['message'] = ['success' => true, 'message' => 'Sửa thông tin album thành công'];
            } else {
                $albums['message'] = ['success' => false, 'message' => 'Sửa thông tin album thất bại'];
            }
            Admin::add_log([
                'admin_id' => $request->session()->get('admin_id'),
                'admin_username' => $request->session()->get('username'),
                'action' => 'Sửa thông tin album có ID = ' . $id,
                'time' => time()
            ]);
        }
        return view('backend.edit_album')->with($albums);
    }

    public function backend_delete_album($id, Request $request) {
        if ($request->isMethod('post')) {
            $album = Album::infoAlbum($id);
            if ($album) {
                Album::deleteAlbum($id);
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Xóa album có ID = ' . $id,
                    'time' => time()
                ]);
                return json_encode(['success' => true, 'message' => 'Xóa album thành công']);
            } else {
                return json_encode(['success' => false, 'message' => 'Không tìm thấy album muốn xóa']);
            }
        }
    }

    public function backend_list_service() {
        $list_service = Service::listService();
        return view('backend.list_service')->with(['services' => $list_service, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_add_service(Request $request) {
        $message = [];
        $message['new_contact'] = $this->unread_mess;
        $message['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['name'] = $request->input('name');
            $param['is_hot'] = $request->input('is_hot');
            $param['description'] = $request->input('description');
            $photo = self::locdau($request->img->getClientOriginalName());
            $file = $request->img;
            $path_upload = 'uploads/services/';
            if (!is_dir('./' . $path_upload)) {
                mkdir('./' . $path_upload, 0777, true);
            }
            $path = $file->move($path_upload, $photo);
            $param['img'] = $path;
            $param['created_time'] = time();
            $param['updated_time'] = time();
            //save in to db albums
            $service = Service::insertService($param);
            if ($service) {
                $message = ['success' => true, 'message' => 'Tạo service mới thành công'];
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Tạo service mới có ID = ' . $service,
                    'time' => time()
                ]);
            } else {
                $message = ['success' => false, 'message' => 'Tạo service mới thất bại'];
            }
        }
        return view('backend.add_service')->with($message);
    }

    public function backend_edit_service($id, Request $request) {
        $data['message'] = [];
        $data['service'] = Service::infoService($id);
        $data['new_contact'] = $this->unread_mess;
        $data['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['name'] = $request->input('name');
            $param['is_hot'] = $request->input('is_hot');
            $param['description'] = $request->input('description');
            if (isset($request->img)) {
                $file = $request->img;
                $photo = self::locdau($file->getClientOriginalName());
                $path_upload = 'uploads/services/';
                $path = $file->move($path_upload, $photo);
                $param['img'] = $path;
            }
            $param['updated_time'] = time();
            $result = Service::updateService($id, $param);
            if ($result) {
                $data['message'] = ['success' => true, 'message' => 'Sửa thông tin service thành công'];
            } else {
                $data['message'] = ['success' => false, 'message' => 'Sửa thông tin service thất bại'];
            }
            Admin::add_log([
                'admin_id' => $request->session()->get('admin_id'),
                'admin_username' => $request->session()->get('username'),
                'action' => 'Sửa thông tin service có ID = ' . $id,
                'time' => time()
            ]);
        }
        return view('backend.edit_service')->with($data);
    }

    public function backend_delete_service($id, Request $request) {
        if ($request->isMethod('post')) {
            $album = Service::infoService($id);
            if ($album) {
                Service::deleteService($id);
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Xóa service có ID = ' . $id,
                    'time' => time()
                ]);
                return json_encode(['success' => true, 'message' => 'Xóa service thành công']);
            } else {
                return json_encode(['success' => false, 'message' => 'Không tìm thấy service muốn xóa']);
            }
        }
    }

    public function backend_list_pricing() {
        $list_pricing = Service::list_service_pricing();
        return view('backend.list_pricing')->with(['pricings' => $list_pricing, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_add_pricing(Request $request) {
        $data['services'] = Service::listService();
        $data['message'] = [];
        $data['new_contact'] = $this->unread_mess;
        $data['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['name'] = $request->input('name');
            $param['service_id'] = $request->input('service_id');
            foreach ($data['services'] as $service) {
                if ($service->id == $param['service_id']) {
                    $param['service_name'] = $service->name;
                    break;
                }
            }
            $param['price'] = $request->input('price');
            $param['content'] = $request->input('content');
            $param['created_time'] = time();
            $param['admin_created'] = $request->session()->get('username');
            $param['updated_time'] = time();
            //save in to db albums
            $service = Service::insertServicePricing($param);
            if ($service) {
                $data['message'] = ['success' => true, 'message' => 'Tạo pricing mới thành công'];
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Tạo pricing mới có ID = ' . $service,
                    'time' => time()
                ]);
            } else {
                $data['message'] = ['success' => false, 'message' => 'Tạo pricing mới thất bại'];
            }
        }
        return view('backend.add_pricing')->with($data);
    }

    public function backend_edit_pricing($id, Request $request) {
        $data['message'] = [];
        $data['services'] = Service::listService();
        $data['pricing'] = Service::infoPricing($id);
        $data['new_contact'] = $this->unread_mess;
        $data['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['name'] = $request->input('name');
            $param['service_id'] = $request->input('service_id');
            foreach ($data['services'] as $service) {
                if ($service->id == $param['service_id']) {
                    $param['service_name'] = $service->name;
                    break;
                }
            }
            $param['price'] = $request->input('price');
            $param['content'] = $request->input('content');
            $param['updated_time'] = time();
            $result = Service::updateServicePricing($id, $param);
            if ($result) {
                $data['message'] = ['success' => true, 'message' => 'Sửa thông tin pricing thành công'];
            } else {
                $data['message'] = ['success' => false, 'message' => 'Sửa thông tin pricing thất bại'];
            }
            Admin::add_log([
                'admin_id' => $request->session()->get('admin_id'),
                'admin_username' => $request->session()->get('username'),
                'action' => 'Sửa thông tin pricing có ID = ' . $id,
                'time' => time()
            ]);
        }
        return view('backend.edit_pricing')->with($data);
    }

    public function backend_delete_pricing($id, Request $request) {
        if ($request->isMethod('post')) {
            $album = Service::infoPricing($id);
            if ($album) {
                Service::deleteServicePricing($id);
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Xóa service có ID = ' . $id,
                    'time' => time()
                ]);
                return json_encode(['success' => true, 'message' => 'Xóa pricing thành công']);
            } else {
                return json_encode(['success' => false, 'message' => 'Không tìm thấy pricing muốn xóa']);
            }
        }
    }

    public function backend_list_news() {
        $news = News::listNews();
        return view('backend.list_news')->with(['news' => $news, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_add_news(Request $request) {
        $message = [];
        $message['new_contact'] = $this->unread_mess;
        $message['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['title'] = $request->input('title');
            $param['is_hot'] = $request->input('is_hot');
            $param['pre_content'] = $request->input('pre_content');
            $param['content'] = $request->input('content');
            $photo = self::locdau($request->img->getClientOriginalName());
            $file = $request->img;
            $path_upload = 'uploads/news/';
            if (!is_dir('./' . $path_upload)) {
                mkdir('./' . $path_upload, 0777, true);
            }
            $path = $file->move($path_upload, $photo);
            $param['img'] = $path;
            $param['admin_created'] = $request->session()->get('username');
            $param['created_time'] = time();
            $param['updated_time'] = time();
            //save in to db albums
            $result = News::insertNews($param);
            if ($result) {
                $message = ['success' => true, 'message' => 'Tạo news mới thành công'];
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Tạo news mới có ID = ' . $result,
                    'time' => time()
                ]);
            } else {
                $message = ['success' => false, 'message' => 'Tạo news mới thất bại'];
            }
        }
        return view('backend.add_news')->with($message);
    }

    public function backend_edit_news($id, Request $request) {
        $data['message'] = [];
        $data['news'] = News::infoNews($id);
        $data['new_contact'] = $this->unread_mess;
        $data['new_order'] = $this->new_order;
        if ($request->isMethod('post')) {
            $param = [];
            $param['title'] = $request->input('title');
            $param['is_hot'] = $request->input('is_hot');
            $param['pre_content'] = $request->input('pre_content');
            $param['content'] = $request->input('content');
            if (isset($request->img)) {
                $file = $request->img;
                $photo = self::locdau($file->getClientOriginalName());
                $path_upload = 'uploads/news/';
                $path = $file->move($path_upload, $photo);
                $param['img'] = $path;
            }
            $param['updated_time'] = time();
            $param['admin_created'] = $request->session()->get('username');
            $result = News::updateNews($id, $param);
            if ($result) {
                $data['message'] = ['success' => true, 'message' => 'Sửa thông tin news thành công'];
            } else {
                $data['message'] = ['success' => false, 'message' => 'Sửa thông tin news thất bại'];
            }
            Admin::add_log([
                'admin_id' => $request->session()->get('admin_id'),
                'admin_username' => $request->session()->get('username'),
                'action' => 'Sửa thông tin news có ID = ' . $id,
                'time' => time()
            ]);
        }
        return view('backend.edit_news')->with($data);
    }

    public function backend_delete_news($id, Request $request) {
        if ($request->isMethod('post')) {
            $news = News::infoNews($id);
            if ($news) {
                News::deleteNews($id);
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Xóa news có ID = ' . $id,
                    'time' => time()
                ]);
                return json_encode(['success' => true, 'message' => 'Xóa news thành công']);
            } else {
                return json_encode(['success' => false, 'message' => 'Không tìm thấy news muốn xóa']);
            }
        }
    }

    public function backend_list_order() {
        $orders = Order::listOrders();
        return view('backend.list_order')->with(['orders' => $orders, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_edit_order($id, Request $request) {
        $message = [];
        $order = Order::orderInfo($id);
        if ($order) {
            if ($request->isMethod('post')) {
                $param['status'] = $request->input('status');
                $param['admin_updated'] = $request->session()->get('username');
                $param['updated_time'] = time();
                $update = Order::saveOrder($id, $param);
                if ($update) {
                    Admin::add_log([
                        'admin_id' => $request->session()->get('admin_id'),
                        'admin_username' => $request->session()->get('username'),
                        'action' => 'Thay đổi trạng thái hoá đơn có ID = ' . $id,
                        'time' => time()
                    ]);
                    $message = ['success' => true, 'message' => 'Thay đổi trạng thái hoá đơn thành công'];
                } else {
                    $message = ['success' => false, 'message' => 'Thay đổi trạng thái hoá đơn thất bại'];
                }
            }
        } else {
            $message = ['success' => false, 'message' => 'Không tìm thấy order'];
        }
        return view('backend.edit_order')->with(['order' => $order, 'message' => $message, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_list_contact() {
        $contacts = Contact::listContacts();
        return view('backend.list_contact')->with(['contacts' => $contacts, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function backend_view_contact($id) {
        Contact::updateContact($id);
        $contact = Contact::infoContact($id);
        return view('backend.view_contact')->with(['contact' => $contact, 'new_contact' => $this->unread_mess, 'new_order' => $this->new_order]);
    }

    public function locdau($string) {
        $string = strtolower($string);
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            '_' => ' '
        );
        foreach ($unicode as $nonUnicode => $uni)
            $string = preg_replace("/($uni)/i", $nonUnicode, $string);
        $string = preg_replace("/[^a-z0-9._]/", '', $string);
        return $string;
    }

}
