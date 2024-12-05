<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryNewRequest;
use App\Models\CategoryNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryNewController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $categoryNew = DB::table('category_news')->orderBy('id', 'desc')
            ->paginate(10);


        return view('admin.category_new.list', compact('categoryNew'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Category_News_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3',
            ], [
                'name.required' => 'Tên danh mục bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new CategoryNew();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm danh mục bài viết thành công!');
                return redirect()->route('route_BackEnd_Category_News_List');
            } else {
                Session::flash('error', 'Thêm danh mục bài viết không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.category_new.create');
    }

    public function edit($id)
    {
        $modelCategoryNew = new CategoryNew();
        $categoryNew = $modelCategoryNew->loadOne($id);
        $this->v['categoryNew'] = $categoryNew;
        return view('admin.category_new.edit', $this->v);
    }

    public function update($id, CategoryNewRequest $request)
    {

        $method_route = 'route_BackEnd_Category_News_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelCategoryNew = new CategoryNew();
        $res = $modelCategoryNew->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Category_News_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}
