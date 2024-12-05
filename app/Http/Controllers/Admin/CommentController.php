<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        // $comment = Comment::with('user')->with('products')->orderBy('id', 'desc')->paginate(10);
        $comment = Comment::get();
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.comment.list', compact('products', "comment"));
    }

    public function edit($id)
    {
        $modelProduct = new Product();
        $this->v['product'] = $modelProduct->loadOne($id);

        $this->v['comment'] = Comment::with('user')->with('products')
            ->where('product_id', '=', $this->v['product']->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.comment.edit', $this->v);
    }

    public function delete(Comment $id)
    {
        if ($id->delete()) {
            Session::flash('success', 'Xoá bình luận thành công!');
            return redirect()->back();
        }
    }
}
