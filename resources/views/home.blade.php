@extends('layouts.client.master')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

@section('title', 'Trang chủ')

@section('content')
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
            border-radius: 1rem;
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
            min-height: 200px;
            max-height: 150px;
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
            background-color: #C92127;
            color: #fff;
            top: 8px;
            right: 8px;
            padding: 5px 10px 5px 10px;
            font-size: .7rem;
            font-weight: 600;
            border-radius: 3px;
            text-transform: uppercase;
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

        .label-left-like {
            background-color: #C92127;


        }

        .new-color:before {
            color: white !important;
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

        .btn-check:focus+.btn-warning,
        .btn-warning:focus {
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
            background-color: var(--btnbg) !important;
            color: var(--btnfontcolor) !important;
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
            color: crimson;
        }

        .fa-chevron-circle-right:before {
            color: darkgray;
        }

        .pagination {
            display: flex;
        }

        .text-muted {
            display: none;
        }

        .page-item {
            border-radius: 20px;
            margin: 0px 5px;
            background: #FAACA8 !important;
        }

        .gallery-box-container {
            display: flex;
            justify-content: space-between;
            flex: 0 1 90%;
            flex-wrap: wrap;
        }

        .gallery-box {
            display: block;
            color: #fff;
            flex: 0 1 calc(25% - 15px);
            height: 400px;
            background: #fbe9f3;
            border-radius: 10px;
            box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        @media screen and (max-width: 1200px) {
            .gallery-box {
                flex: 0 1 calc(50% - 15px);
                margin: 15px 0;
            }
        }

        @media screen and (max-width: 640px) {
            .gallery-box {
                flex: 0 1 calc(100% - 15px);
            }
        }

        .gallery-box__img-container {
            display: block;
            width: 135%;
            height: 350px;
            background: #fff;
            border-radius: 0 0 40px 40px;
            border: 2px solid #fffff8;
            transform: rotate(25deg);
            position: absolute;
            left: -15%;
            top: -75px;
            transition: all 0.4s ease;
            overflow: hidden;
        }

        @media screen and (max-width: 1200px) {
            .gallery-box__img-container {
                height: 420px;
                top: -180px;
            }
        }

        @media screen and (max-width: 900px) {
            .gallery-box__img-container {
                height: 420px;
                top: -120px;
            }
        }

        @media screen and (max-width: 640px) {
            .gallery-box__img-container {
                height: 450px;
                top: -190px;
            }
        }

        .gallery-box__img {
            display: block;
            width: 100%;
            transform: rotate(-25deg) scale(1.1);
            transition: all 0.4s ease;
        }

        .gallery-box__text-wrapper {
            transition: all 0.4s ease;
            position: absolute;
            left: 15px;
            top: 250px;
            width: 80%;
        }

        .gallery-box__text {
            font-weight: 500;
            font-size: 22px;
            padding: 8px 0;
            box-shadow: 8px 0 0 rgba(0, 0, 0, 0.7), -8px 0 0 rgba(0, 0, 0, 0.7);
            box-decoration-break: clone;
            line-height: 2;
            background: rgba(0, 0, 0, 0.7);
        }

        @media screen and (max-width: 900px) {
            .gallery-box__text {
                font-size: 20px;
            }
        }

        .gallery-box:hover .gallery-box__img-container {
            width: 110%;
            height: 450px;
            border-radius: 0;
            transform: rotate(0);
            left: -2px;
            top: -120px;
            object-fit: cover;
        }

        .gallery-box:hover .gallery-box__img {
            width: 100%;
            transform: rotate(0deg) scale(1);
            
        }

        .gallery-box:hover .gallery-box__text-wrapper {
            top: 288px;
        }

        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Roboto:wght@300;400;500;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        main {
            position: relative;
            width: calc(min(90rem, 90%));
            margin: 0 auto;
            min-height: 80vh;
            column-gap: 3rem;
            padding-block: min(20vh, 3rem);
        }

        .bg {
            position: absolute;
            top: -4rem;
            left: -12rem;
            z-index: -1;
            opacity: 0;
        }

        .bg2 {
            position: absolute;
            bottom: -2rem;
            right: -3rem;
            z-index: -1;
            width: 9.375rem;
            opacity: 0;
        }

        main>div span {
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1rem;
            color: #717171;
        }

        main>div h1 {
            text-transform: capitalize;
            letter-spacing: 0.8px;
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-size: clamp(3.4375rem, 3.25rem + 0.75vw, 4rem);
            background-color: #005baa;
            background-image: linear-gradient(45deg, #005baa, #000000);
            background-size: 100%;
            background-repeat: repeat;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -moz-background-clip: text;
            -moz-text-fill-color: transparent;
        }

        main>div hr {
            display: block;
            background: #005baa;
            height: 0.25rem;
            width: 6.25rem;
            border: none;
            margin: 1.125rem 0 1.875rem 0;
        }

        main>div p {
            line-height: 1.6;
        }

        main a {
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
            color: #717171;
            font-weight: 500;
            background: #fff;
            border-radius: 3.125rem;
            transition: 0.3s ease-in-out;
        }

        main>div>a {
            border: 2px solid #c2c2c2;
            margin-top: 2.188rem;
            padding: 0.625rem 1.875rem;
        }

        main>div>a:hover {
            border: 0.125rem solid #005baa;
            color: #005baa;
        }

        .swiper {
            width: 100%;
            padding-top: 3.125rem;
        }

        .swiper-pagination-bullet,
        .swiper-pagination-bullet-active {
            background: #fff;
        }

        .swiper-pagination {
            bottom: 1.25rem !important;
        }

        .swiper-slide {
            width: 18.75rem;
            height: 28.125rem;
            display: flex;
            flex-direction: column;
            justify-content: end;
            align-items: self-start;
        }

        .swiper-slide h2 {
            color: #fff;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-size: 1.4rem;
            line-height: 1.4;
            margin-bottom: 0.625rem;
            padding: 0 0 0 1.563rem;
            text-transform: uppercase;
        }

        swiper-slide p {
            color: #dadada;
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            padding: 0 1.563rem;
            line-height: 1.6;
            font-size: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .swiper-slide a {
            margin: 1.25rem 1.563rem 3.438rem 1.563rem;
            padding: 0.438em 1.875rem;
            font-size: 0.9rem;
        }

        .swiper-slide a:hover {
            color: #005baa;
        }

        .swiper-slide div {
            display: none;
            opacity: 0;
            padding-bottom: 0.625rem;
        }

        .swiper-slide-active div {
            display: block;
            opacity: 1;
        }

        .swiper-slide--one {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn0.fahasa.com/media/catalog/product/i/m/image_217480.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--two {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://khoahocvakhampha.com.vn/images/upload/product/Anh%2024.%20Khat%20Vong%20Toi%20Cai%20Vo%20Han.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--three {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://www.nxbtre.com.vn/Images/Editor/images/nxbtre_full_01572018_125708.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--four {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://product.hstatic.net/200000488629/product/57_134f8066798c4efd9bb8a2f497dffb65_master.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-slide--five {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
                url("https://cdn0.fahasa.com/media/catalog/product/2/4/24d0a082-972d-44c5-bcc3-5b41f575cbd5.jpg") no-repeat 50% 50% / cover;
        }

        .swiper-3d .swiper-slide-shadow-left,
        .swiper-3d .swiper-slide-shadow-right {
            background-image: none;
        }

        @media screen and (min-width: 48rem) {
            main {
                display: flex;
                align-items: center;
            }

            .bg,
            .bg2 {
                opacity: 0.1;
            }
        }

        @media screen and (min-width: 93.75rem) {
            .swiper {
                width: 85%;
            }
        }
        .fa-heart{
            margin-top:20px;
        }
        .block-link-1{
            display: flex !important;
            align-items: center !important;
        }
        .flaticon-bag{
            margin-left:10px;
        }
    </style>
    <div class="fullwidth-template container shadow "  style="background:#fbe9f361 !important; margin-top:100px !important; border-radius:20px;">
        <main>
            <div>
                <span>Cửa hàng</span>
                <h1>BOOK STORE</h1>
                <hr>
                <p>BOOK STORE nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống Fahasa trên toàn quốc.
                </p>
                
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide--one">
                        <div>
                            <h2>TIỂU THUYẾT</h2>
                           
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide--two">
                        <div>
                            <h2>KHOA HỌC</h2>
                           
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide--three">

                        <div>
                            <h2> THIẾU NHI</h2>
                            
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide--four">

                        <div>
                            <h2>TÌNH YÊU</h2>
                    
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide--five">

                        <div>
                            <h2>KINH DỊ</h2>
                   
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <img src="https://cdn.pixabay.com/photo/2021/11/04/19/39/jellyfish-6769173_960_720.png" alt=""
                class="bg" style="z-index:10; opacity:0.1;">
            <img src="https://cdn.pixabay.com/photo/2012/04/13/13/57/scallop-32506_960_720.png" alt=""
                class="bg2" style="z-index:200;" >
        </main>
    </div>
        <div class="container">

            <div class="section-001"
                style="padding: 0px !important; background:white; border:1px solid #white; border-radius:10px !important ;">
                <div class="container" style="border-radius:50px;">

                    <div class="container bg-trasparent my-4 p-3" style="position: relative">
                        <p class="mb-0 " style="font-weight:bold; color:#C92127;">
                            <img class="mr-2"
                                src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images/ico_menu_red.svg"
                                alt="" style="width:30px; height:30px;">
                            Danh mục sản phẩm
                        </p>
                        <hr>
                        <div class="d-flex" style="overflow: auto; ">

                            @if ($typeProduct)
                                @foreach ($typeProduct as $type)
                                    <a href="{{ route('route_FrontEnd_Product', ['type_product' => $type->id]) }}"
                                        class="d-flex flex-column justify-content-center align-items-center"
                                        style="flex: 0 0 15%; text-align: center; cursor: pointer;">
                                        <img class="m-auto" src="{{ asset($type->image) }}" alt="" width="100"
                                            height="100" style="max-width:100px; max-height:100px; border-radius:10px;">
                                        <p class="text-center mt-2" style="font-weight:bold;">{{ $type->name }}</p>
                                    </a>
                                @endforeach
                            @endif

                        </div>


                    </div>

                    {{-- <div class="small text-muted my-4">Images by <a target="_blank" href="https://www.amazon.com/">Amazon</a></div> --}}
                </div>
            </div>
        </div>
        <div class="container">

            <div class="section-001"
                style="padding: 0px !important; background:white; border:1px solid #white; border-radius:10px !important ;">
                <div class="container" style="border-radius:50px;">

                    <div class="container bg-trasparent my-4 p-3" style="position: relative">
                        <p class="mb-0" style="font-weight:bold; color:#C92127;">
                            <img class="mr-2"
                                src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images/category/ico_sachtrongnuoc.svg"
                                alt="" style="width:30px; height:30px;">
                            Top sản phẩm bán chạy hôm nay
                        </p>
                        <hr>
                        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($result as $comment)
                                @if ($number <= 10)
                                    <div class="col-md-3 mb-3 hp">
                                        <div class="card h-100 shadow" style="border-radius:5px !important;">
                                            <a target="_blank"
                                                href="{{ route('route_FrontEnd_Product_Detail', ['id' => $comment['product_id']->id]) }}"
                                                class="item">
                                                <img src="{{ asset($comment['product_id']->image) ? '' . asset($comment['product_id']->image) : $comment['product_id']->name }}"
                                                    class="card-img-top" alt="product.title" />
                                            </a>

                                            @if (auth()->user())
                                                <?php
                                                $found = false;
                                                $id = $comment['product_id']->id;
                                                $a = '';
                                                $b = '';
                                                $c = 0;
                                                if ($cart_like) {
                                                    foreach ($cart_like as $item) {
                                                        if ($item[0] == $id) {
                                                            $found = true;
                                                            $a = 'label-left-like';
                                                            $b = 'new-color';
                                                            $c = 1;
                                                        }
                                                    }
                                                }
                                                
                                                ?>
                                                <div class="label-left  shadow-sm {{ $a }}"id="Cart_Like_{{ $comment['product_id']->id }}"
                                                    onclick="AddToCardLike('{{ $comment['product_id']->id }}',{{ $c }})">
                                                    <i class=" fa-solid fa-heart {{ $b }}" 
                                                    style="margin: 0px !important; padding:5px !important;"></i>
                                                </div>
                                            @endif
                                            <div class="label-top shadow-sm">
                                                <a class="text-white" target="_blank"
                                                    href="#">{{ $comment['product_id']->getCategory_product->name ?? 'Chưa phân loại' }}</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="clearfix mb-3">

                                                    @if ($comment['product_id']->discount && $comment['product_id']->discount > 0)
                                                        @php
                                                            $discount = 0;
                                                            $discount =
                                                                (int) $comment['product_id']->discount /
                                                                (int) $comment['product_id']->price;
                                                            $price_primary =
                                                                (int) $comment['product_id']->price -
                                                                (int) $comment['product_id']->discount;
                                                        @endphp
                                                        <span class="float-start badge rounded- d-flex"
                                                            style="align-items: center;">
                                                            <p class="mb-0" style="color: #C92127; font-size:12px;">
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
                                                            {{ number_format((int) $comment['product_id']->price) }} /vnđ

                                                        </span>
                                                    @else
                                                        <span class="float-start badge rounded-pill"
                                                            style="font-size:13px; color: #C92127;">
                                                            {{ number_format($comment['product_id']->price) }} /vnđ</span>
                                                    @endif




                                                    <span class="float-end"><a href="#"
                                                            class="small text-muted text-uppercase aff-link">/vnđ</a></span>
                                                </div>
                                                <h5 class="card-title" style="height:30px !important;">
                                                    <a target="_blank"
                                                        href="{{ route('route_FrontEnd_Product_Detail', ['id' => $comment['product_id']->id]) }}">{{ $comment['product_id']->name }}</a>
                                                </h5>
                                                @if (auth()->user())
                                                    <div class="add-to-cart">
                                                        <button class="btn btn-warning bold-btn text-white"
                                                            style="background: #C92127 !important; opacity:0.8; border-radius:5px !important; font-size:12px !important;"
                                                            onclick="AddToCard('{{ $comment['product_id']->id }}')"
                                                            @if ($comment['product_id']->quantity <= 0) disabled @endif>Thêm giỏ
                                                            hàng</button>

                                                        <input type="hidden"
                                                            id="amount_product_{{ $comment['product_id']->id }}"
                                                            name="amount" value="1">
                                                        <input type="hidden"
                                                            id="id_product_{{ $comment['product_id']->id }}"
                                                            name="id" value="{{ $comment['product_id']->id }}">
                                                        <input type="hidden" name="name"
                                                            value="{{ $comment['product_id']->name }}">
                                                        <input type="hidden" name="price"
                                                            value="{{ $comment['product_id']->price }}">
                                                        <input type="hidden" name="discount"
                                                            value="{{ $comment['product_id']->discount }}">
                                                        <input type="hidden" name="image"
                                                            value="{{ $comment['product_id']->image }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $number = $number + 1;
                                @endphp
                            @endforeach


                        </div>

                    </div>

                    {{-- <div class="small text-muted my-4">Images by <a target="_blank" href="https://www.amazon.com/">Amazon</a></div> --}}
                </div>
            </div>
        </div>
        <div class="bg-white container p-4 shadow " style="border-radius:20px;">
            <p class="mb-0 container" style="font-weight:bold; color:#C92127;">
                <img class="mr-2" src="https://cdn0.fahasa.com/media/wysiwyg/icon-menu/icon_dealhot_new.png"
                    alt="" style="width:30px; height:30px;">
                Sản phẩm mới nhất
            </p>
            <hr>
            <div class="gallery-box-container container" style="margin-top:120px;">
            
                <a href="#" class="gallery-box ">
                    <span class="gallery-box__img-container">
                        <img src="https://images.pexels.com/photos/4226119/pexels-photo-4226119.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                            alt="" class="gallery-box__img">
                    </span>
                    <span class="gallery-box__text-wrapper">
                        <span class="gallery-box__text">
                            Mở mang trí tuệ
                        </span>
                    </span>
                </a>
    
                <a href="#" class="gallery-box">
                    <span class="gallery-box__img-container">
                        <img src="https://images.pexels.com/photos/5653734/pexels-photo-5653734.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                            alt="" class="gallery-box__img">
                    </span>
                    <span class="gallery-box__text-wrapper">
                        <span class="gallery-box__text">
                            Tăng cường trí nhớ
                        </span>
                    </span>
                </a>
    
                <a href="#" class="gallery-box">
                    <span class="gallery-box__img-container">
                        <img src="https://images.pexels.com/photos/9063383/pexels-photo-9063383.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                            alt="" class="gallery-box__img">
                    </span>
                    <span class="gallery-box__text-wrapper">
                        <span class="gallery-box__text">
                            Cải thiện tâm trạng
                        </span>
                    </span>
                </a>
    
                <a href="#" class="gallery-box">
                    <span class="gallery-box__img-container">
                        <img src="https://images.pexels.com/photos/10976200/pexels-photo-10976200.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                            alt="" class="gallery-box__img">
                    </span>
                    <span class="gallery-box__text-wrapper">
                        <span class="gallery-box__text">
                            Khả năng sáng tạo
                        </span>
                    </span>
                </a>
            </div>
        </div>
       
        <div class="section-001">
            <div class="container">
                {{-- <div class="akasha-heading style-01">
                    <div class="heading-inner">
                        <h3 class="title">Danh sách sản phẩm</h3>
                    </div>
                </div> --}}


                <div class="container-fluid bg-trasparent my-4 p-3"
                    style="position: relative; background:white;  border:1px solid #white; border-radius:10px !important ;">
                    <p class="mb-0" style="font-weight:bold; color:#C92127;">
                        <img class="mr-2" src="https://cdn0.fahasa.com/media/wysiwyg/icon-menu/icon_dealhot_new.png"
                            alt="" style="width:30px; height:30px;">
                        Sản phẩm mới nhất
                    </p>
                    <hr>
                    <div class="pl-3 pr-3 row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">


                        @foreach ($listProduct as $product)
                            <div class="col-md-3 mb-3 hp">
                                <div class="card h-100 shadow" style="border-radius:5px !important;">
                                    <a target="_blank"
                                        href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}"
                                        class="item">
                                        <img src="{{ asset($product->image) ? '' . asset($product->image) : $product->name }}"
                                            class="card-img-top" alt="product.title" />
                                    </a>

                                    <div class="label-top shadow-sm">
                                        <a class="text-white" target="_blank"
                                            href="#">{{ $product->getCategory_product->name ?? 'Chưa phân loại' }}</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="clearfix mb-3">
                                            @if ($product->discount && $product->discount > 0)
                                                @php
                                                    $discount = 0;
                                                    $discount = (int) $product->discount / (int) $product->price;
                                                    $price_primary = (int) $product->price - (int) $product->discount;
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
                                                    {{ number_format($product->price) }} /vnđ

                                                </span>
                                            @else
                                                <span class="float-start badge rounded-pill"
                                                    style="font-size:13px; color: #C92127;"> {{ number_format($product->price) }}
                                                    /vnđ</span>
                                            @endif

                                            <span class="float-end"><a href="#"
                                                    class="small text-muted text-uppercase aff-link">/vnđ</a></span>
                                        </div>
                                        <h5 class="card-title" style="height:30px !important;">
                                            <a target="_blank"
                                                href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                        </h5>
                                        @if (auth()->user())
                                            <div class="add-to-cart">
                                                <button class="btn btn-warning bold-btn text-white"
                                                    style="background: #C92127 !important; opacity:0.8; border-radius:5px !important; font-size:12px !important;"
                                                    onclick="AddToCard('{{ $product->id }}')"
                                                    @if ($product->quantity <= 0) disabled @endif>Thêm giỏ hàng</button>

                                                <input type="hidden" id="amount_product_{{ $product->id }}"
                                                    name="amount" value="1">
                                                <input type="hidden" id="id_product_{{ $product->id }}" name="id"
                                                    value="{{ $product->id }}">
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
                    <div class="mt-2 w-100 d-flex justify-content-center" style="align-items: center">
                        {{-- @if (!$name)
                        {{ $listProduct->appends(request()->query())->links() }}
                        @endif --}}
                        <a href="{{ route('route_FrontEnd_Product') }}" class="text-center "
                            style="border: 2px solid #C92127; padding:3px 40px; border-radius:5px; color:#C92127; font-weight:bold; ">
                            Xem thêm</a>
                    </div>
                </div>

                {{-- <div class="small text-muted my-4">Images by <a target="_blank" href="https://www.amazon.com/">Amazon</a></div> --}}
            </div>
        </div>
        <div>
            <div class="akasha-banner style-02 left-center">
                <div class="banner-inner">
                    <figure class="banner-thumb">
                        <img src="https://thebookland.vn/contents/1665644241374_flash-sale-2.jpg"
                            class="attachment-full size-full" alt="img" style="height: 400px">
                    </figure>
                    {{-- <div class="banner-info container">
                        <div class="banner-content">
                            <div class="title-wrap">
                                <div class="banner-label">
                                    Ngày lễ ưu đãi
                                </div>
                                <h6 class="title">
                                    Đại tiệc giảm giá </h6>
                            </div>
                            <div class="button-wrap">
                                <div class="subtitle">
                                    Lorem ipsum dolor sit amet consectetur adipiscing elit justo
                                </div>
                                <a class="button" target="_self" href="#"><span>Mua ngay</span></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="section-001">
            <div class="container">
                <div class="akasha-heading style-01">
                    <div class="heading-inner">
                        <h3 class="title">Sản phẩm khuyến mại</h3>
                    </div>
                </div>
                <div class="akasha-products style-01">
                    <div class="response-product product-list-owl owl-slick equal-container better-height"
                        data-slick="{&quot;arrows&quot;:true,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:1}"
                        data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                        @foreach ($productDiscount as $proDisc)
                            <div
                                class="product-item recent-product style-01 rows-space-0 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock  instock sale shipping-taxable purchasable product-type-simple">
                                <div class="product-inner tooltip-left">
                                    <div class="product-thumb">
                                        <a class="thumb-link"
                                            href="{{ route('route_FrontEnd_Product_Detail', ['id' => $proDisc->id]) }}"
                                            tabindex="-1">
                                            <img class="img-responsive" style="height: 180px"
                                                src="{{ asset($proDisc->image) ? '' . Storage::url($proDisc->image) : $proDisc->name }}"
                                                alt="{{ $proDisc->name }}" width="270" height="350">
                                        </a>
                                        <div class="flash">
                                            @if ($proDisc->discount)
                                                @php
                                                    $discountPercentage = ($proDisc->discount / $proDisc->price) * 100;
                                                @endphp
                                                <span class="onsale"><span
                                                        class="number">{{ round($discountPercentage, 2) }}%</span></span>
                                            @endif
                                            <span class="onnew"><span class="text">New</span></span>
                                        </div>
                                        <div class="group-button">
                                            <form action="{{ route('route_FrontEnd_Add_Cart') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="add-to-cart">
                                                    <button class="button product_type_simple add_to_cart_button">Giỏ
                                                        hàng<i class="fa fa-cart"></i></button>
                                                    <input type="hidden" name="amount" value="1">
                                                    <input type="hidden" name="id" value="{{ $proDisc->id }}">
                                                    <input type="hidden" name="name" value="{{ $proDisc->name }}">
                                                    <input type="hidden" name="price" value="{{ $proDisc->price }}">
                                                    <input type="hidden" name="discount"
                                                        value="{{ $proDisc->discount }}">
                                                    <input type="hidden" name="image" value="{{ $proDisc->image }}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-info equal-elem">
                                        <h3 class="product-name product_title">
                                            <a href="{{ route('route_FrontEnd_Product_Detail', ['id' => $proDisc->id]) }}"
                                                tabindex="-1">{{ $proDisc->name }}</a>
                                        </h3>
                                        <span class="price">
                                            @if ($proDisc->discount)
                                                <del><span class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol"></span>{{ number_format($proDisc->discount) }}</span></del>
                                            @endif
                                            <ins><span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol"></span>{{ number_format($proDisc->price) }}</span></ins>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="section-038">
            <div class="akasha-banner style-07 left-center">
                <div class="banner-inner">
                    <figure class="banner-thumb">
                        <img src="{{ asset('client/assets/images/banner28.jpg') }}" class="attachment-full size-full"
                            alt="img">
                    </figure>
                    <div class="banner-info container">
                        <div class="banner-content">
                            <div class="title-wrap">
                                <div class="banner-label">
                                    30/4 - 1/5
                                </div>
                                <h6 class="title">
                                    Mới </h6>
                            </div>
                            <div class="cate">
                                Giảm tới 10%
                            </div>
                            <div class="button-wrap">
                                <div class="subtitle">
                                    Mus venenatis habitasse leo malesuada lacus commodo faucibus torquent donec
                                </div>
                                <a class="button" target="_self" href="#"><span>Mua ngay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="section-001" style="height:600px !important; margin-bottom:200px;"> 
            <div class="container  p-4" style="border-radius:10px; background:#fbe9f3;">
                <p class="mb-0" style="font-weight:bold; color:#C92127;">
                    <img class="mr-2"
                        src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images/category/ico_sachtrongnuoc.svg"
                        alt="" style="width:30px; height:30px;">
                    Tin tức mới nhất
                </p>
                <hr>
                <div class="akasha-blog style-01">
                    <div class="blog-list-owl owl-slick equal-container better-height"
                        data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:3,&quot;rows&quot;:1}"
                        data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                        @foreach ($news as $new)
                            <article
                                class="post-item post-grid rows-space-0 post-195
                                post type-post status-publish format-standard 
                                has-post-thumbnail hentry category-light category-table 
                                category-life-style tag-light tag-life-style "
                                style=" border-radius:5px; ">
                                <div class="post-inner blog-grid p-2">
                                    <div class="post-thumb bg-white  p-4"
                                        style="
                                    border-top-left-radius:10px; border-top-right-radius:10px;
                                   
                                    ">
                                        <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}"
                                            tabindex="0">
                                            <img src="{{ asset($new->images) ? '' . Storage::url($new->images) : $new->title }}"
                                                class="img-responsive attachment-370x330 size-370x330"
                                                alt="{{ $new->title }}" width="250" height="250"
                                                style="height: 250px;
                                               
                                                ">
                                        </a>

                                    </div>
                                    <div class="post-content p-4  "
                                        style=" border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                                        <div class="post-meta">
                                            <div class="post-author">
                                                Đăng bởi:<a href="#" tabindex="0">
                                                    {{ $new->admin->username }}</a>
                                            </div>
                                        </div>
                                        <div class="post-info equal-elem">
                                            <h2 class="post-title"><a
                                                    href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}"
                                                    tabindex="0">{{ $new->title }}</a>
                                            </h2>
                                            {{ $new->short_desc }}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="section-008" style="margin-top: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-rocket-ship"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">Ship hoả tốc</h4>
                                    <div class="desc">Trong nội thành
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-padlock"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">Bảo mật</h4>
                                    <div class="desc">Bảo mật thông tin khách hàng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-recycle"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">7 ngày đổi trả</h4>
                                    <div class="desc">Tại cửa hàng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-support"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">Tư vấn</h4>
                                    <div class="desc">Tư vấn 24/7
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="section-008">
            <div class="akasha-instagram style-01">
                <div class="instagram-owl owl-slick"
                    data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:15,&quot;dots&quot;:false,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:5,&quot;rows&quot;:1}"
                    data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;15&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;15&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesMargin&quot;:&quot;15&quot;}}]">
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate1.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate2.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate3.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate4.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate5.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="-1">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate6.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="-1">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate7.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="-1">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate8.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 3,
                slideShadows: true
            },
            keyboard: {
                enabled: true
            },
            mousewheel: {
                thresholdDelta: 70
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                },
                1560: {
                    slidesPerView: 3
                }
            }
        });
    </script>
    <script>
        let items = document.querySelectorAll('.gallery .list .item');
        let next = document.getElementById('next');
        let prev = document.getElementById('prev');
        let thumbnails = document.querySelectorAll('.thumbnail .item');

        // config param
        let countItem = items.length;
        let itemActive = 0;
        // event next click
        next.onclick = function() {
            itemActive = itemActive + 1;
            if (itemActive >= countItem) {
                itemActive = 0;
            }
            showgallery();
        }
        //event prev click
        prev.onclick = function() {
            itemActive = itemActive - 1;
            if (itemActive < 0) {
                itemActive = countItem - 1;
            }
            showgallery();
        }
        // gallery
        let refreshInterval = setInterval(() => {
            next.click();
        }, 5000)

        function showgallery() {
            // remove item active old
            let itemActiveOld = document.querySelector('.gallery .list .item.active');
            let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
            itemActiveOld.classList.remove('active');
            thumbnailActiveOld.classList.remove('active');

            // active new item
            items[itemActive].classList.add('active');
            thumbnails[itemActive].classList.add('active');

            // clear auto time run gallery
            clearInterval(refreshInterval);
            refreshInterval = setInterval(() => {
                next.click();
            }, 5000)
        }

        // thumbnail
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                itemActive = index;
                showgallery();
            })
        })
    </script>
@endsection
