<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function createComment(CommentRequest $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'content' => 'required|min:1|max:500',
            ], [
                'content.required' => 'Nội dung bắt buộc nhập',
                'content.min' => 'Nội dung tối thiểu 1 ký tự',
                'content.max' => 'Nội dung tối đa 500 ký tự',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new Comment();
            $res = $modelTes->saveNew($params);

            if ($res > 0) {
                return redirect()->back();
            }
        }
    }
    
    public function commentDelete(Comment $comment)
    {
        if ($comment->delete()) {
            return redirect()->back();
        }
    }
}
