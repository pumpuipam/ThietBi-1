<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\News;
use App\Models\OrderDetail;
use App\Models\TypeProduct;


use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {

        return view('client.auth.login');
    }

    public function indexReturn(Request $request){
        return redirect()->route('route_FrontEnd_Home');
    }

    public function getPost(Request $request) {
        dd(1);
        
    }
}
