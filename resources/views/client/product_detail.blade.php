@extends('layouts.client.master')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <style>
        
        .timeline {
            position: relative;
            padding: 20px 0;
            list-style: none;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline:before {
            content: " ";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            margin-left: -1.5px;
            background-color: #e9ecef;
        }

        .timeline>.timeline-item {
            position: relative;
            margin-bottom: 20px;
        }

        .timeline>.timeline-item:after,
        .timeline>.timeline-item:before {
            content: " ";
            display: table;
        }

        .timeline>.timeline-item:after {
            clear: both;
        }

        .timeline>.timeline-item>.timeline-panel {
            float: left;
            position: relative;
            width: 46%;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 2px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
        }

        .timeline>.timeline-item>.timeline-panel:before {
            content: " ";
            display: inline-block;
            position: absolute;
            top: 26px;
            right: -8px;
            border-color: transparent #e9ecef;
            border-style: solid;
            border-width: 8px 0 8px 8px;
        }

        .timeline>.timeline-item>.timeline-panel:after {
            content: " ";
            display: inline-block;
            position: absolute;
            top: 27px;
            right: -7px;
            border-color: transparent #fff;
            border-style: solid;
            border-width: 7px 0 7px 7px;
        }

        .timeline>.timeline-item>.timeline-badge {
            z-index: 10;
            position: absolute;
            top: 16px;
            left: 50%;
            width: 55px;
            height: 55px;
            margin-left: -25px;
            border-radius: 50% 50% 50% 50%;
            text-align: center;
            font-size: 1.4em;
            line-height: 50px;
            color: #fff;
            overflow: hidden;
        }

        .timeline>.timeline-item.timeline-inverted>.timeline-panel {
            float: right;
        }

        .timeline>.timeline-item.timeline-inverted>.timeline-panel:before {
            right: auto;
            left: -8px;
            border-right-width: 8px;
            border-left-width: 0;
        }

        .timeline>.timeline-item.timeline-inverted>.timeline-panel:after {
            right: auto;
            left: -7px;
            border-right-width: 7px;
            border-left-width: 0;
        }

        .timeline-badge.primary {
            background-color: #7460ee;
        }

        .timeline-badge.success {
            background-color: #39c449;
        }

        .timeline-badge.warning {
            background-color: #ffbc34;
        }

        .timeline-badge.danger {
            background-color: #f62d51;
        }

        .timeline-badge.info {
            background-color: #009efb;
        }

        .timeline-title {
            margin-top: 0;
            color: inherit;
            font-weight: 400;
        }

        .timeline-body>p,
        .timeline-body>ul {
            margin-bottom: 0;
        }

        .timeline-left:before {
            left: 30px;
        }

        .timeline-left>.timeline-item>.timeline-badge {
            left: 30px;
            top: 9px;
        }

        .timeline-left>.timeline-item>.timeline-panel {
            width: calc(100% - 80px);
        }

        .timeline-right:before {
            right: 30px;
            left: auto;
        }

        .timeline-right>.timeline-item>.timeline-badge {
            right: 5px;
            top: 9px;
            left: auto;
        }

        .timeline-right>.timeline-item>.timeline-panel {
            width: calc(100% - 80px);
        }
       
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <div class="single-thumb-vertical main-container shop-page no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="akasha-notices-wrapper">

                    </div>
                    <div>
                        <ul class="trail-items breadcrumb" style="background: none; ">
                            <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_Home') }}"
                                    style="font-weight:bold;"><span>Trang chủ</span></a></li>
                            <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_Product') }}"
                                    style="font-weight:bold;"><span>Sản phẩm</span></a></li>
                            <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="trail-item trail-end active"><span>{{ $product->name }}</span>
                            </li>
                        </ul>
                    </div>
                    <div id="product-27"
                        class="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                        <div class="main-contain-summary">
                            <div class="contain-left has-gallery">
                                <div class="single-left bg-white p-3 shadow" style="border-radius:10px; height:56vh;">
                                    <div
                                        class="akasha-product-gallery akasha-product-gallery--with-images akasha-product-gallery--columns-4 images">

                                        @if (auth()->user())
                                            <?php
                                            $found = false;
                                            $id = $product->id;
                                            $a = '';
                                            $b = '';
                                            $c = 0;
                                            if ($cart_like) {
                                                foreach ($cart_like as $item) {
                                                    if ($item[0] == $id) {
                                                        $found = true;
                                                        $a = 'label-left-like';
                                                        $b = 'background:#C92127 !important; color:white !important;';
                                                        $c = 1;
                                                    }
                                                }
                                            }
                                            
                                            ?>
                                            <a href="#" class="akasha-product-gallery__trigger"
                                                style="{{ $b }}" id="Cart_Like_{{ $product->id }}"></a>
                                        @endif
                                        <div class="flex-viewport">
                                            <figure class="akasha-product-gallery__wrapper">
                                                <div class="akasha-product-gallery__image">
                                                    <img src="{{ asset($product->image) ? '' . asset($product->image) : $product->name }}"
                                                        alt="img">
                                                </div>
                                                @if ($product->image_description)
                                                    @foreach (json_decode($product->image_description) as $image_description)
                                                        <div class="akasha-product-gallery__image">
                                                            <img alt="img"
                                                                src="{{ asset($image_description) ? '' . asset($image_description) : $product->name }}">
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </figure>
                                        </div>
                                        <ol class="flex-control-nav flex-control-thumbs">
                                            <li><img src="{{ asset($product->image) ? '' . asset($product->image) : $product->name }}"
                                                    alt="img"></li>
                                            @if ($product->image_description)
                                                @foreach (json_decode($product->image_description) as $image_description)
                                                    <li>
                                                        <img src="{{ asset($image_description) ? '' . asset($image_description) : $product->name }}"
                                                            alt="img">
                                                    </li>
                                                @endforeach
                                            @endif


                                        </ol>
                                    </div>
                                </div>
                                <div class="summary entry-summary bg-white p-4 shadow"
                                    style="border-radius:10px; height:56vh;">
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <h1 class="product_title entry-title">{{ $product->name }}</h1>
                                    <?php
                                    $rating = $start; // Giá trị xếp hạng
                                    $fullStars = floor($rating); // Số sao đầy đủ (nguyên)
                                    $halfStar = $rating - $fullStars; // Kiểm tra nếu có nửa sao
                                    $totalStars = 5; // Tổng số sao là 5
                                ?>
                                
                                <div>
                                    <?php for ($i = 0; $i < $fullStars; $i++): ?>
                                        <i class="fa-solid fa-star" style="color: gold;"></i> <!-- Sao đầy đủ -->
                                    <?php endfor; ?>
                                
                                        <?php if ($halfStar > 0): ?>
                                            <i class="fa-solid fa-star-half-stroke" style="color: gold;"></i>
                                        <?php endif; ?>
                                    
                                        <?php for ($i = 0; $i < $totalStars - ceil($rating); $i++): ?>
                                            <i class="fa-solid fa-star" style="color: lightgray;"></i> <!-- Sao không tô màu -->
                                        <?php endfor; ?>
                                    </div>
                                    <p class="price">
                                        @if ($product->discount)
                                            <span class="akasha-Price-amount amount text-secondary"
                                                style="font-weight:bold; font-size:15px; text-decoration-line: line-through;">
                                                <span class="akasha-Price-currencySymbol">
                                                </span>
                                                {{ number_format($product->price) }} /vnđ</span>
                                        @endif <span class="akasha-Price-amount amount"
                                            style="font-weight:bold;  font-size:20px;"><span
                                                class="akasha-Price-currencySymbol"></span>{{ number_format($product->price - $product->discount) }}
                                            /vnđ</span>
                                    </p>

                                    @if ($product->discount)
                                        <div style="
                                            color:white;
                                            background-color:#C92127 !important; width:50px; font-weight:bold; border-radius:5px;"
                                            class="text-center">
                                            @php
                                                $check = 0;
                                                $check = (int) $product->discount / (int) $product->price;

                                            @endphp
                                            {{ round($check * 100) }} %
                                        </div>
                                    @endif

                                    <p class="stock in-stock">
                                        Số lượng tồn:
                                        @if ($product->quantity > 0)
                                            <span id="quantity_product"> {{ $product->quantity ?? 0 }}</span>
                                        @else
                                            <span id="quantity_product"> Hết hàng</span>
                                        @endif

                                    </p>
                                    <div class="akasha-product-details__short-description">
                                        <p>{{ $product->short_desc }}</p>
                                    </div>
                                    <div class="single_variation_wrap mb-3">
                                        @if ($product->pdf)
                                            <a href="{{ route('route_FrontEnd_See', $product->id) }}"
                                                class="bg-success text-white"
                                                style="
                                            border-radius:5px; 
                                            cursor: pointer; 
                                            padding:10px 20px; 
                                            border-radius:20px;
                                            
                                            "
                                                target="_blank">
                                                <i class="fa-solid fa-eye mr-2"></i> Xem nhanh</a>
                                        @endif
                                    </div>
                                    @if (auth()->user())
                                        {{-- <form class="variations_form cart" action="{{ route('route_FrontEnd_Add_Cart') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf --}}


                                        <div class="single_variation_wrap">
                                            <div class="akasha-variation single_variation"></div>
                                            <div class="akasha-variation-add-to-cart variations_button"
                                                style="display:flex; align-items: center;">
                                                <div class="quantity" style="margin-bottom: 0px !important;">
                                                    <span class="qty-label">Số lượng:</span>
                                                    <div class="control">
                                                        <a class="btn-number qtyminus quantity-minus" id="qtyminus"
                                                            href="#"
                                                            onclick="CheckMinus('{{ $product->id }}')">-</a>
                                                        <input type="number" min="1"
                                                            id="amount_product__{{ $product->id }}" name="amount"
                                                            onkeyup="OnKey('{{ $product->id }}')"
                                                            value="1" class="input-qty input-text qty text"
                                                            size="4">
                                                        <a class="btn-number qtyplus quantity-plus" id="qtyplus"
                                                            href="#" onclick="CheckPlus('{{ $product->id }}')">+</a>
                                                    </div>
                                                </div>

                                                <button
                                                    class="single_add_to_cart_button button 
                                                        alt akasha-variation-selection-needed"
                                                    onclick="AddToCard_1('{{ $product->id }}')" id="addToCard"
                                                    style="background-color:white; 
                                                          border:1px solid #C92127 !important; 
                                                          color:#C92127 !important; font-weight:bold;"
                                                    @if ($product->quantity <= 0) disabled @endif>
                                                    Thêm vào giỏ hàng
                                                </button>
                                                <input type="hidden" id="id_product" value="{{ $product->id }}">
                                                <input type="hidden" id="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" id="id_product__{{ $product->id }}"
                                                    name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="discount" value="{{ $product->discount }}">
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    @endif
                                    {{-- <div class="akasha-share-socials">
                                        <h5 class="social-heading">Share: </h5>
                                        <a target="_blank" class="facebook" href="#">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                        <a target="_blank" class="twitter" href="#"><i class="fa fa-twitter"></i>
                                        </a>
                                        <a target="_blank" class="pinterest" href="#"> <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a target="_blank" class="googleplus" href="#"><i
                                                class="fa fa-google-plus"></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="single-product-policy  ">
                                <div class="akasha-iconbox style-01 bg-white shadow">
                                    <div class="iconbox-inner">
                                        <div class="icon">
                                            <span class="flaticon-rocket-ship"></span>
                                            <span class="flaticon-rocket-ship"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Ship hoả tốc</h4>
                                            <div class="desc">Trong nội thành
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="akasha-iconbox style-01 bg-white shadow">
                                    <div class="iconbox-inner">
                                        <div class="icon">
                                            <span class="flaticon-padlock"></span>
                                            <span class="flaticon-padlock"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Bảo mật</h4>
                                            <div class="desc">Bảo mật thông tin khách hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="akasha-iconbox style-01 bg-white shadow">
                                    <div class="iconbox-inner">
                                        <div class="icon">
                                            <span class="flaticon-recycle"></span>
                                            <span class="flaticon-recycle"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">7 ngày đổi trả</h4>
                                            <div class="desc">Đổi trực tiếp tại cửa hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="akasha-tabs akasha-tabs-wrapper bg-white p-4 shadow" style="border-radius:10px;">
                            <ul class="tabs dreaming-tabs" role="tablist">
                                <li class="description_tab active" id="tab-title-description" role="tab"
                                    aria-controls="tab-description">
                                    <a href="#tab-description">Mô tả</a>
                                </li>
                            </ul>
                            <div>
                                <h2>Mô tả</h2>
                                <div class="container-table" style="font-size:14px !important;">
                                    <div class="container-cell">
                                        <p class="az_custom_heading">{!! $product->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="akasha-tabs akasha-tabs-wrapper bg-white p-4 shadow" style="border-radius:10px;">
                            <ul class="tabs dreaming-tabs" role="tablist">
                                <li class="description_tab active" id="tab-title-description" role="tab"
                                    aria-controls="tab-description">
                                    <a href="#tab-description">Đánh giá sản phẩm</a>
                                </li>
                            </ul>
                            @if(auth()->user())
                            <div class="akasha-Tabs-panel akasha-Tabs-panel--description panel entry-content akasha-tab"
                                id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                                <div class="container-table">
                                    <div class="container-cell">
                                        <div class="mb-3" id="rateYo"></div>
                                        <div class="mb-3" id="ValueRateYo"></div>

                                        <div>
                                            <label for="comment">Bình luận</label>
                                            <textarea id="comment" type="text" style="width:100%;"> </textarea>
                                        </div>
                                        <div class="mt-3 d-flex" style="float: right;">
                                            <button style="background: #C92127 !important;" onclick="SendRate()">
                                                Gửi bình luận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <hr>
                            <div>
                                @php
                                    use Illuminate\Support\Carbon;
                                @endphp
                                @if ($RateYo->count() > 0)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <ul class="timeline timeline-left">

                                                            @foreach ($RateYo as $rate)
                                                                <li class="timeline-inverted timeline-item">
                                                                    <div class="timeline-badge success"><img
                                                                            src="{{ $rate->User->avatar ? ($rate->User->avatar) : 'https://cellphones.com.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg' }}"
                                                                            alt="img" class="img-fluid"
                                                                            style="width:100%; height:100%;" /></div>
                                                                    <div class="timeline-panel">
                                                                        <div class="timeline-heading">
                                                                            <h4
                                                                                class="timeline-title mb-2
                                                                            @if(auth()->user())
                                                                            @if ($rate->user->id == auth()->user()->id) text-danger @endif @endif
                                                                            ">
                                                                                {{ $rate->user->email }}</h4>
                                                                            @php
                                                                                $rating = $rate->rate;
                                                                            @endphp
                                                                            <div>
                                                                                @foreach (range(1, 5) as $i)
                                                                                    @if ($i <= $rating)
                                                                                        <i class="fa-solid fa-star"
                                                                                            style="color: gold;"></i>
                                                                                    @else
                                                                                        <i class="fa-solid fa-star"
                                                                                            style="color: gray;"></i>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <p>
                                                                                <small class="text-muted"><i
                                                                                        class="fa fa-clock-o"></i>
                                                                                    Thời gian bình luận:
                                                                                    {{ Carbon::parse($rate->created_at)->format('d-m-Y') }}
                                                                                </small>
                                                                            </p>
                                                                        </div>
                                                                        <div class="timeline-body">
                                                                            <p>
                                                                                {{ $rate->comment }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                            {{-- <li class="timeline-inverted timeline-item">
                                                                <div class="timeline-badge danger"><span class="font-12">2018</span></div>
                                                                <div class="timeline-panel">
                                                                    <div class="timeline-heading"><h4 class="timeline-title">Lorem ipsum dolor</h4></div>
                                                                    <div class="timeline-body">
                                                                        <p>
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni
                                                                            commodi quisquam.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </li> --}}
                                                            
                                                        </ul>
                                                      
                                                    </div>
                                                    <style>
                                                        .pagination-wrapper nav span,
                                                        .pagination-wrapper nav a[rel="prev"],
                                                        .pagination-wrapper nav a[rel="next"] {
                                                            display: none; /* Hide "Previous" and "Next" links, and other non-clickable spans */
                                                        }
                                                        /* .leading-5{
                                                            display: none;
                                                        } */
                                                        /* .pagination-wrapper nav ul {
                                                            display: flex;
                                                            justify-content: center;
                                                        }

                                                        .pagination-wrapper nav ul li {
                                                            margin: 0 5px; 
                                                        }

                                                        .pagination-wrapper nav ul li a {
                                                            display: block;
                                                            padding: 10px 15px;
                                                            background-color: #f8f9fa;
                                                            border: 1px solid #dee2e6;
                                                            border-radius: 5px;
                                                            color: #007bff;
                                                            text-decoration: none;
                                                        }

                                                        .pagination-wrapper nav ul li.active a {
                                                            background-color: #007bff;
                                                            color: white;
                                                            border-color: #007bff;
                                                        } */

                                                    </style>
                                                    <div class="pagination-wrapper" style="display: flex; justify-content: center;">
                                                        {{ $RateYo->links('pagination::tailwind') }}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                   
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 dreaming_related-product">
                        <div class="block-title">
                            <h2 class="product-grid-title">
                                <span>Các sản phẩm liên quan</span>
                            </h2>
                        </div>
                        <div class="p-5  owl-slick owl-products equal-container better-height"
                            data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                            data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">

                            @foreach ($product_comment as $comment)
                                <div class="p-4 product-item card style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes border"
                                    style="border-radius:5px;">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link" href="#" tabindex="0"
                                                style="object-fit: contain; height:300px;">
                                                <img class="img-responsive"
                                                    src="{{ asset($comment->image) ? '' . asset($comment->image) : $comment->name }}"
                                                    alt="Long Oversized" width="100%" height="100%">
                                            </a>


                                            @if (auth()->user())
                                                <div class="group-button add-to-cart">

                                                    <button class="btn btn-warning bold-btn text-white"
                                                        style="background: #C92127 !important; border:none;"
                                                        onclick="AddToCard('{{ $comment->id }}')"
                                                        @if ($comment->quantity <= 0) disabled @endif>Thêm giỏ
                                                        hàng</button>
                                                </div>
                                                <input type="hidden" id="amount_product_{{ $comment->id }}"
                                                    name="amount" value="1">
                                                <input type="hidden" id="id_product_{{ $comment->id }}" name="id"
                                                    value="{{ $comment->id }}">
                                                <input type="hidden" name="name" value="{{ $comment->name }}">
                                                <input type="hidden" name="price" value="{{ $comment->price }}">
                                                <input type="hidden" name="discount" value="{{ $comment->discount }}">
                                                <input type="hidden" name="image" value="{{ $comment->image }}">
                                            @endif
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h3 class="product-name product_title">
                                                <a target="_blank"
                                                    href="{{ route('route_FrontEnd_Product_Detail', ['id' => $comment->id]) }}">{{ $comment->name }}</a>
                                            </h3>

                                            <a class="text-black" target="_blank"
                                                href="#">({{ $comment->getCategory_product->name ?? 'Chưa phân loại' }})</a>

                                            <div class="clearfix mb-3">
                                                @if ($comment->discount && $comment->discount > 0)
                                                    @php
                                                        $discount = 0;
                                                        $discount = (int) $comment->discount / (int) $comment->price;
                                                        $price_primary =
                                                            (int) $comment->price - (int) $comment->discount;
                                                    @endphp
                                                    <span class="float-start badge rounded- d-flex"
                                                        style="align-items: center;">
                                                        <p class="mb-0" style="color: #C92127; font-size:13px;">
                                                            {{ number_format($price_primary) }} /vnđ

                                                        </p>
                                                        <p class="ml-3 mb-0"
                                                            style="background: #C92127;
                                            padding:5px 10px; color:white;
                                            font-size:12px;
                                            border-radius:5px;
                                            ">
                                                            {{ round($discount * 100) }} %</p>

                                                    </span>
                                                    <span class="float-start badge rounded- d-flex"
                                                        style="align-items: center; text-decoration-line:line-through; ">
                                                        {{ number_format((int) $comment->price) }} /vnđ

                                                    </span>
                                                @else
                                                    <span class="float-start badge rounded-pill"
                                                        style="font-size:13px; color: #C92127;">
                                                        {{ number_format($comment->price) }} /vnđ</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>
        <script>
            // Function to change the text of specified elements
function changePaginationText() {
    // Select all elements with the class 'relative'
    const elements = document.querySelectorAll('.relative');

    // Loop through each element
    elements.forEach((element) => {
        // Change "« Previous" to "Trước đó"
        if (element.textContent.includes('« Previous')) {
            element.textContent = element.textContent.replace('« Previous', ' « Trước đó').trim();
        }
        
        // Change "Next »" to "Tiếp Theo"
        if (element.textContent.includes('Next »')) {
            element.textContent = element.textContent.replace('Next »', 'Tiếp Theo »').trim();
        }
    });
}

// Run the function when the document is fully loaded
document.addEventListener('DOMContentLoaded', changePaginationText);

            $('#rateYo').rateYo({
                rating: 0,
                normalFill: "#A0A0A0",
                ratedFill: "#ffff00",
                fullStar: true

            }).on("rateyo.set", function(e, data) {
                $('#ValueRateYo').val(data.rating);
            });

            function SendRate() {
                var rate = $('#ValueRateYo').val();
                var id = $('#id_product').val();

                var user_id = $('#user_id').val();
                var comment = $('#comment').val();
                $.ajax({
                    url: '{{ route('rateYo.store') }}',
                    type: 'get',
                    data: {
                        rate: rate,
                        id: id,
                        comment: comment,
                        user_id: user_id
                    },
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "bình luận sản phẩm đã được duyệt",
                                showConfirmButton: false,
                                timer: 1500
                            });

                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Bình luận thành công",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        </script>
        <script>
            function CheckMinus(id) {
                var input = $('#amount_product__' + id).val();
                if (parseInt(input) > 1) {
                    $('#amount_product__' + id).val(parseInt(input) - 1);


                }


            }
            

            function OnKey(id){
                var input = $('#amount_product__' + id).val();
                var quantity_product = $('#quantity_product').text();
                console.log(input);
                if(input > 0){
                    if(parseInt(input) > parseInt($('#quantity_product').text())){
                        alert('Số lượng không đủ');
                        $('#addToCard').prop('disabled', true);
                    $('#amount_product__' + id).val($('#quantity_product').text());

                    }
                }else{
                    alert('Số lượng phải lớn hơn 0');
                    $('#amount_product__' + id).val(1);
                }
            }

            

            function CheckPlus(id) {
                var input = $('#amount_product__' + id).val();
                var Input_number = parseInt(input) + 1;
                var quantity_product = $('#quantity_product').text();
                if (Input_number > parseInt(quantity_product)) {
                    alert('Số lượng không đủ');
                    $('#addToCard').prop('disabled', true);
                } else {
                    $('#amount_product__' + id).val(Input_number);

                }
            }
        </script>
    @endsection
