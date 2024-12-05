<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CategoryNew;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //

    public function index(Request $request)
    {

        $page = $request->page ?? 1;
        $pageSize = $request->per_page ?? 100;
        $query  = CategoryNew::orderByDesc('created_at')->where('status',1);

        if($request->status){
            $cate_new = $query->where('status', $request->status);
        }
        if ($pageSize) {
            $cate_new = $query->paginate($pageSize, ['*'], 'page', $page);
        } else {
            $cate_new = $query->get();
        }
        return response()->json([
            'data' => $cate_new,
            'success' => true,
            'message' => 'User list retrieved successfully'
        ]);
    }

    public function index_new(Request $request){
        $page = $request->page ?? 1;
        $pageSize = $request->per_page ?? 100;
        $query  = News::orderByDesc('created_at')->where('status', 1)->with('category_news','admin');
        if($request->status){
            $news = $query->where('status', $request->status);
        }
        if ($pageSize) {
            $news = $query->paginate($pageSize, ['*'], 'page', $page);
        } else {
            $news = $query->get();
        }
        return response()->json([
            'data' => $news,
            'success' => true,
            'message' => 'User list retrieved successfully'
        ]);
    }
}
