<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NewController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $news = News::with('admin')->with('category_news')->orderBy('id', 'desc')->paginate(10);

        return view('admin.news.list', compact('news'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_News_Create";
        $admin = DB::table('users')->get();
        $category = DB::table('category_news')->get();

        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|min:3',
                'description' => 'required',
                'user_id' => 'required',
                'cate_new_id' => 'required',
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
            ], [
                'title.required' => 'Tiêu đề bắt buộc nhập!',
                'title.min' => 'Tiêu đề tối thiểu 3 ký tự!',
                'description.required' => 'Nội dung bắt buộc nhập!',
                'user_id.required' => 'Bạn chưa chọn người đăng!',
                'cate_new_id.required' => 'Bạn chưa chọn danh mục!',
                'images.required' => 'Bạn chưa chọn ảnh!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['images'] = $this->uploadFile($request->file('images'));
            }

            $modelTes = new News();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm bài viết thành công!');
                return redirect()->route('route_BackEnd_News_List');
            } else {
                Session::flash('error', 'Thêm bài viết không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.news.create', compact('admin', 'category'));
    }

    public function edit($id)
    {
        $modelNew = new News();
        $news = $modelNew->loadOne($id);
        $this->v['user_id'] = DB::table('users')->get();
        $this->v['cate_new_id'] = DB::table('category_news')->get();
        $this->v['news'] = $news;
        return view('admin.news.edit', $this->v);
    }

    public function update($id, NewRequest $request)
    {

        $method_route = 'route_BackEnd_News_Edit';
        $params = [];

        $params['cols'] = $request->post();

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['images'] = $this->uploadFile($request->file('images'));
        }

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelNew = new News();
        $res = $modelNew->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_News_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('news', $fileName, 'public');
    }
}
