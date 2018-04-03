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
use Session;

class PageController extends Controller {

    public function __construct() {
        if (!Session::has('username') || !Session::has('admin_id') || !Session::has('admin_name')) {
            return redirect('/backend/login')->send();
        }
    }

    public function index() {
        return view('backend.index');
    }

    public function backend_list_album() {
        $list_album = Album::listAlbum();
        return view('backend.list_album')->with(['albums' => $list_album]);
    }

    public function backend_add_album(Request $request) {
        $message = [];
        if ($request->isMethod('post')) {
            $param = [];
            $param['title'] = $request->input('title');

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
                    $detail[$idx]['video_link'] = $request->detail['video'][$idx];
                }
                $idx++;
            }
            $result = Album::insertAlbumDetail($detail);
            if ($result) {
                $message = ['success' => true, 'message' => 'Tạo album mới thành công'];
                Admin::add_log([
                    'admin_id' => $request->session()->get('admin_id'),
                    'admin_username' => $request->session()->get('username'),
                    'action' => 'Tạo album mới có ID = ' . $album_id,
                    'time' => time()
                ]);
            } else {
                $message = ['success' => false, 'message' => 'Tạo album mới thất bại'];
            }
        }
        return view('backend.add_album')->with($message);
    }

    public function backend_edit_album($id, Request $request) {

        $albums['info'] = Album::infoAlbum($id);
        $albums['detail'] = Album::infoAlbumDetail($id);
        $albums['message'] = [];
        if ($request->isMethod('post')) {
            $param = [];
            $path_upload = 'uploads/albums/';
            if (isset($request->img)) {
                $photo = self::locdau($request->img->getClientOriginalName());
                $file = $request->img;
                $path = $file->move($path_upload, $photo);
                $param['img'] = $path;
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
                    $detail[$idx]['video_link'] = $request->detail['video'][$idx];
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
                'action' => 'Sửa thông tin album mới ID = ' . $id,
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
                    'action' => 'Xóa album mới ID = ' . $id,
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
        return view('backend.list_service')->with(['services' => $list_service]);
    }

    public function backend_add_service(Request $request) {
        $message = [];
        if ($request->isMethod('post')) {
            $param = [];
            $param['name'] = $request->input('name');
            $param['is_hot'] = $request->input('is_hot');
            $param['price'] = $request->input('price');
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
        if ($request->isMethod('post')) {
            $param = [];
            $param['name'] = $request->input('name');
            $param['is_hot'] = $request->input('is_hot');
            $param['price'] = $request->input('price');
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
                'action' => 'Sửa thông tin service mới ID = ' . $id,
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
                    'action' => 'Xóa service mới ID = ' . $id,
                    'time' => time()
                ]);
                return json_encode(['success' => true, 'message' => 'Xóa service thành công']);
            } else {
                return json_encode(['success' => false, 'message' => 'Không tìm thấy service muốn xóa']);
            }
        }
    }

    public function backend_list_news() {
        $news = News::listNews();
        return view('backend.list_news')->with(['news' => $news]);
    }

    public function backend_add_news(Request $request) {
        $message = [];
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
                'action' => 'Sửa thông tin news mới ID = ' . $id,
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
                    'action' => 'Xóa news mới ID = ' . $id,
                    'time' => time()
                ]);
                return json_encode(['success' => true, 'message' => 'Xóa news thành công']);
            } else {
                return json_encode(['success' => false, 'message' => 'Không tìm thấy news muốn xóa']);
            }
        }
    }

    public function backend_list_order() {
        return view('backend.list_order');
    }

    public function backend_edit_order($id, Request $request) {
        return view('backend.edit_order');
    }

    public function backend_list_contact() {
        return view('backend.list_contact');
    }

    public function backend_view_contact($id) {
        return view('backend.view_contact');
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
