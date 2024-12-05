@extends('layouts.client.master')

@section('title', 'Danh mục hàng hóa')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
<style>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
@import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");

:root {
    --font1: 'Heebo', sans-serif;
    --font2: 'Fira Sans Extra Condensed', sans-serif;
    --font3: 'Roboto', sans-serif;

    --btnbg: #ffcc00;
    --btnfontcolor: rgb(61, 61, 61);
    --btnfontcolorhover: rgb(255, 255, 255);
    --btnbghover: #ffc116;
    --btnactivefs: rgb(241, 195, 46);


    --label-index: #960796;
    --danger-index: #5bc257;
/* PAGINATE */
    --link-color: #000;
    --link-color-hover: #fff;
    --bg-content-color: #ffcc00;

}

.container-fluid {
    max-width: 1400px;

}

.card {
    background: #fff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
    transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
    border: 0;
    border-radius:5px;
}

.card-img,
.card-img-top {
    border-top-left-radius: calc(1rem - 1px);
    border-top-right-radius: calc(1rem - 1px);
}


.card h5 {
    overflow: hidden;
    height: 55px;
    font-weight: 300;
    font-size: 1rem;
}

.card h5 a {
  color: black;
  text-decoration: none;
} 

.card-img-top {
    width: 100%;
    min-height: 250px;
    max-height: 250px;
    object-fit: contain;
    padding: 30px;
}

.card h2 {
    font-size: 1rem;
}


.card:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
}

/* Centered text */
.label-top {
    position: absolute;
    background-color: #C92127 !important;
    color: #fff;
    top: 8px;
    right: 8px;
    padding: 5px 10px 5px 10px;
    font-size: .7rem;
    font-weight: 600;
    border-radius: 3px;
    text-transform: uppercase;
}

.top-right {
    position: absolute;
    top: 24px;
    left: 24px;

    width: 90px;
    height: 90px;
    border-radius: 50%;
    font-size: 1rem;
    font-weight: 900;
    background: #8bc34a;
    line-height: 90px;
    text-align: center;
    color: white;
}

.top-right span {
    display: inline-block;
    vertical-align: middle;
    /* line-height: normal; */
    /* padding: 0 25px; */
}

.aff-link {
    /* text-decoration: overline; */
    font-weight: 500;
}

.over-bg {
    background: rgba(53, 53, 53, 0.85);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(0.0px);
    -webkit-backdrop-filter: blur(0.0px);
    border-radius: 10px;
}
.bold-btn {

    font-size: 1rem;
    font-weight: 500;
    text-transform: uppercase;
    padding: 5px 50px 5px 50px;
}
.box .btn {
    font-size: 1.5rem;
}

@media (max-width: 1025px) {
    .btn {
        padding: 5px 40px 5px 40px;
    }
}
@media (max-width: 250px) {
    .btn {
        padding: 5px 30px 5px 30px;
    }
}

/* START BUTTON */
.btn-warning {
    background: var(--btnbg);
    color: var(--btnfontcolor);
    fill: #ffffff;
    border: none;
    text-decoration: none;
    outline: 0;
    /* box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25); */
    border-radius: 100px;
}
.btn-warning:hover {
    background: var(--btnbghover);
    color: var(--btnfontcolorhover);
    /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
}
.btn-check:focus + .btn-warning, .btn-warning:focus {
    background: var(--btnbghover);
    color: var(--btnfontcolorhover);
    /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
}
.btn-warning:active:focus {
    box-shadow: 0 0 0 0.25rem var(--btnactivefs);
}
.btn-warning:active {
    background: var(--btnbghover);
    color: var(--btnfontcolorhover);
    /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
}

/* END BUTTON */

.bg-success {
    font-size: 1rem;
    background-color: var(--btnbg)!important;
    color: var(--btnfontcolor)!important;
}
.bg-danger {
    font-size: 1rem;
}


.price-hp {
    font-size: 1rem;
    font-weight: 600;
    color: darkgray;
}

.amz-hp {
    font-size: .7rem;
    font-weight: 600;
    color: darkgray;
}

.fa-question-circle:before {
    /* content: "\f059"; */
    color: darkgray;
}

.fa-heart:before {
    color:crimson;
}
.fa-chevron-circle-right:before {
    color: darkgray;
}
.pagination{
    display: flex;
}
.text-muted{
    display: none;
}

.page-item{
    border-radius:20px;
    margin:0px 5px;
    background:#FAACA8 !important;
}
.label-left {
    position: absolute;
    background-color: white;
    border: 1px solid #C92127;
    color: #fff;
    top: 8px;
    left: 8px;
    padding: 5px 10px 5px 10px;
    font-size: .7rem;
    font-weight: 600;
    border-radius: 3px;
    text-transform: uppercase;
    cursor: pointer;
}

.label-left-like{
    background-color: #C92127;
    
    
}
.new-color:before {
    color: white !important;
}
    </style>
</style>
    <div class="main-container shop-page left-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-xl-9 col-lg-8 col-md-8 col-sm-12 has-sidebar">
                        <div >
                            <ul class="trail-items breadcrumb" style="background: none; ">
                                <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_Home') }}" style="font-weight:bold;"><span>Trang chủ</span></a></li>
                                <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="trail-item trail-end active"><span>Sản phẩm</span>
                                </li>
                            </ul>
                        </div>
                   
                        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                            @foreach ($products as $product)
                                <div class="col-md-4 mb-3 hp" style="border-radius:5px; !important">
                                    <div class="card h-100 shadow">
                                    <a target="_blank" href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">
                                        <img src="{{ asset($product->image) ? '' . asset($product->image) : $product->name }}" class="card-img-top" alt="product.title" />
                                    </a>
                                    @if(auth()->user())
                                       
                                    <?php 
                                    $found = false;
                                    $id = $product->id;
                                    $a= '';
                                    $b = '';
                                    $c = 0;
                                    if($cart_like){
                                        foreach($cart_like as $item){
                                        if ($item[0] == $id) {
                                            $found = true;
                                            $a = 'label-left-like';
                                            $b = 'new-color';
                                            $c = 1;
                                        }
                                    }
                                    }
                                  
                                        
                                ?>
                                <div class="label-left  shadow-sm {{ $a }}
                                "  id="Cart_Like_{{ $product->id }}"
                                onclick="AddToCardLike('{{ $product->id }}',{{ $c }})">
                                    <i class=" fa-solid fa-heart {{ $b  }}"></i>
                                </div>
                     
                        @endif
                                    <div class="label-top shadow-sm">
                                        <a class="text-white" target="_blank" href="#">{{$product->getCategory_product->name ?? ''}}

                                           
                                        </a>
                                    </div>
                                 
                                    <div class="card-body">
                                        <div class="clearfix mb-3">
                                        {{-- <span class="float-start badge rounded-pill bg-success">{{number_format($product->price)}} /vnđ</span> --}}
                                    <div class="d-flex">
                                        @if($product->discount && (int)$product->discount > 0)

                                            @php
                                                $discount = 0;
                                                $discount = (int)$product->discount / (int)$product->price;
                                                $price_primary = (int)$product->price - (int)$product->discount
                                            @endphp
                                                <span class="float-start badge rounded- d-flex" 
                                                    style="align-items: center; text-decoration-line:line-through; font-size:8px; "> 
                                                        {{number_format((int)$product->discount+ (int)$product->price)}} /vnđ 
                                                        
                                                </span>
                                                <span class="float-start badge rounded- d-flex" style="align-items: center;"> 
                                                    <p class="mb-0"  style="color: #C92127; font-size:13px;">  
                                                        {{ number_format($price_primary) }} /vnđ 
                                                        
                                                    </p>
                                                    <p class="ml-3 mb-0" style="background: #C92127;
                                                    padding:5px 10px; color:white;
                                                    font-size:12px;
                                                    border-radius:5px;
                                                    ">{{ round($discount * 100 ) }} %</p>
                                                    
                                                </span>
                                                
                                            @else
                                                <span class="float-start badge rounded-pill" style="font-size:13px; color: #C92127;" > 
                                                    {{number_format($product->price)}} /vnđ</span>
                                            @endif
                                    </div>
                                        
                                        <span class="float-end"><a href="#" class="small text-muted text-uppercase aff-link">/VNĐ</a></span>
                                        </div>
                                        <h5 class="card-title" style="height: 30px;">
                                        <a target="_blank" href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">{{$product->name}}</a>
                                        <br>
                                        <a target="_blank" href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">({{($product->type_Product->name ?? 'Chưa phân loại')}})</a>

                                        </h5>
                                        @if(auth()->user())
                                            
                                            {{-- <form action="{{ route('route_FrontEnd_Add_Cart') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf --}}
                                            <div class="add-to-cart w-100">
                                                <button class="btn btn-warning bold-btn text-white" 
                                                style="background: #C92127 !important; opacity:0.8; border-radius:5px !important; font-size:12px !important;"
                                                onclick="AddToCard('{{ $product->id }}')"
                                                @if($product->quantity <= 0)
                                                disabled
                                            @endif>Thêm giỏ hàng</button>
                                                <input type="hidden" id="amount_product_{{ $product->id }}" name="amount" value="1">
                                                <input type="hidden" id="id_product_{{ $product->id }}" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="discount" value="{{ $product->discount }}">
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                            </div>
                                        {{-- </form> --}}
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="d-flex w-100">
                            {{ $products->appends(request()->query())->links() }}
                        </div>

                    
                </div>
                <div class="sidebar col-xl-3 col-lg-4 col-md-4 col-sm-12">
                    <div id="widget-area" class="widget-area shop-sidebar">
                        <div  id="akasha_product_search-2" class="widget akasha widget_product_search">
                            {{-- <div class="bg-white pt-3 pb-3 shadow" style="border-radius:10px; "> --}}
                                {{-- <form class="akasha-product-search">
                                    <input id="akasha-product-search-field-0" class="search-field shadow bg-white"
                                        placeholder="Search products…" value="{{ $name_product }}" name="name_product" type="search">
                                    <button
                                    style="color:#C92127;
                                    font-weight:bold;
                                    cursor:pointer;"
                                    
                                    type="submit" value="Search">Search</button>
                                </form> --}}
                            {{-- </div> --}}
                           
                        </div>
                        <div id="akasha_layered_nav-6" class="widget akasha widget_layered_nav akasha-widget-layered-nav">
                           
                            <ul class="akasha-widget-layered-nav-list">
                               
                                     
                                        <form action="{{ route('route_FrontEnd_Product') }}" method="GET">
                                            <div class="bg-white pl-5 pt-2 mb-4 shadow" style="border-radius:10px;">
                                                <h2 class="widgettitle mt-2 mb-0"><a href="{{ route('route_FrontEnd_Product') }}">Nhóm sản phẩm</a><span
                                                    class="arrow"></span></h2>
                                                <div class="d-flex">
                                                    {{-- {{ dd($id) }} --}}
                                                    <input type="radio" value="" name="id" @if($cate_id_pro == '' || !$cate_id_pro) checked @endif>
                                                    <label class="text-black ml-3">Tất cả</label>
                                                </div>
                                            
                                                @foreach ($categoryProduct as $cate)
                                                    <div class="d-flex">
                                                    
                                                        <input type="radio" value="{{$cate->id}}" name="id" @if($cate_id_pro == $cate->id) checked @endif>
                                                        <label class="text-black ml-3">{{ $cate->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                    <div class="bg-white pl-5 pt-2 shadow" style="border-radius:10px;">
                                        <h2 class="widgettitle mb-0 mt-2"><a href="{{ route('route_FrontEnd_Product') }}">Thể loại</a><span
                                            class="arrow"></span></h2>
                                            <div class="d-flex">
                                        
                                                <input type="radio" value="" name="type_product" @if($type_id == '') checked @endif>
                                                <label class="text-black ml-3">Tất cả</label>
                                            </div>
                                        @foreach ($type_product as $type)
                                            <div class="d-flex">
                                            
                                                <input type="radio" value="{{$type->id}}" name="type_product" @if($type_id == $type->id) checked @endif>
                                                <label class="text-black ml-3">{{ $type->name }}</label>
                                            </div>
                                        
                                        @endforeach
                                    </div>

                                    <div class="bg-white pl-5 mt-4 pt-2 shadow" style="border-radius:10px;">
                                        <h2 class="widgettitle mb-0 mt-2"><a href="{{ route('route_FrontEnd_Product') }}">Nhà cung cấp</a><span
                                            class="arrow"></span></h2>
                                            <div class="d-flex">
                                        
                                                <input type="radio" value="" name="supplier_id" @if($supplier_id == '') checked @endif>
                                                <label class="text-black ml-3">Tất cả</label>
                                            </div>
                                        @foreach ($Supplier as $type)
                                            <div class="d-flex">
                                            
                                                <input type="radio" value="{{$type->id}}" name="supplier_id" @if($supplier_id == $type->id) checked @endif>
                                                <label class="text-black ml-3">{{ $type->name }}</label>
                                            </div>
                                        
                                        @endforeach
                                    </div>
                                    <div class="bg-white pl-5 pt-2 mt-4 shadow" style="border-radius:10px;">
                                        <h2 class="widgettitle"><a href="{{ route('route_FrontEnd_Product') }}">Lọc theo giá</a><span
                                            class="arrow"></span></h2>
                                            <div class="d-flex">
                                            
                                                <input type="radio" value="3" name="price_product" 
                                                
                                                @if($price_product == 3 || !$price_product) checked @endif
                                                >
                                                <label class="text-black ml-3">Mặc định</label>
                                            </div>
                                            <div class="d-flex">
                                            
                                                <input type="radio" value="1" name="price_product" @if($price_product == 1) checked @endif>
                                                <label class="text-black ml-3">Giảm dần</label>
                                            </div>
                                            <div class="d-flex">
                                            
                                                <input type="radio" value="2" name="price_product" @if($price_product == 2) checked @endif>
                                                <label class="text-black ml-3">Tăng dần</label>
                                            </div>
                                    </div>
                                    <div class="bg-white mt-4  shadow"  style="border-radius:10px;">
                                        <h2 class="widgettitle mt-4 ml-5 mb-0"><a href="{{ route('route_FrontEnd_Product') }}">Thanh lọc giá</a><span
                                            class="arrow"></span></h2>
                                        <div class="p-5">
                                           
                                                <input type="text" id="amount" name="search_amount" class="p-0" readonly="" style="border:0; color:#f6931f; font-weight:bold;">
                                          
                                               
                                              <div id="slider-range"></div>
                                        </div>
                                         
                                    </div>
                                     


                                    <div class="bg-white pl-5 mt-4 pt-3 pb-3 shadow" style="border-radius:10px;">
                                        <button  style="background:white; color:#C92127; width:180px;
                                        border-radius:10px; border:1px solid #C92127 !important; font-weight:bold;"> 
                                        <i class="fa fa-search"></i> Tìm kiếm</button>

                                    </div>
                                   
                                </form>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       $(function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [ 
            @if($form)
                {{ str_replace(',', '', $form) }}
            @else
                0
            @endif
            ,  
            @if($to)
                {{ str_replace(',', '', $to) }}
            @else
                10000000
            @endif 
        ],
        slide: function( event, ui ) {
            $( "#amount" ).val(ui.values[ 0 ].toLocaleString('en-US') + " /vnđ - " + ui.values[ 1 ].toLocaleString('en-US') + " /vnđ");
        }
    });
    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ).toLocaleString('en-US') + " /vnđ - " + $( "#slider-range" ).slider( "values", 1 ).toLocaleString('en-US') + " /vnđ");
});

    </script>
@endsection
