@extends('layouts.client.master')

@section('title', 'Liên hệ')

@section('content')

    <div class="banner-wrapper has_background">
        
        <img src="assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner mt-5">
            <div  class="container">
                <ul class="trail-items breadcrumb" style="background: none; ">
                    <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_Home') }}" style="font-weight:bold;"><span>Trang chủ</span></a></li>
                    <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                    <li class="trail-item trail-end active"><span>Liên hệ</span>
                    </li>
                </ul>
            </div>
            <h1 class="page-title">Liên hệ</h1>
        </div>
    </div>
    <div class="site-main container no-sidebar mb-5">
        <div class="section-041">
            <div class="container">
                {{-- <div class="akasha-google-maps" id="akasha-google-maps" data-hue="" data-lightness="1" data-map-style="2"
                    data-saturation="-99" data-longitude="-73.985130" data-latitude="40.758896" data-pin-icon=""
                    data-zoom="14" data-map-type="ROADMAP"></div> --}}
            </div>
        </div>
        <div class="section-042" style="padding-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 offset-xl-1 col-xl-10 col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="az_custom_heading">BOOK STORE                             </h4>
                                <p>- <i class="fa-solid fa-phone mr-2"></i> Hotline: 0788 047 274</p>
                             
                                <p>- <i class="fa-solid fa-tag mr-2"></i> Địa chỉ: 321 đường 30/4 Phường Xuân Khánh, Ninh Kiều, Cần Thơ</p>
                                <h4 class="az_custom_heading">Thời gian mở cửa</h4>
                                <p>- <i class="fa-solid fa-house mr-2"></i>Mở cửa từ 7:00 AM - 10:00 PM</p>
                            </div>
                            <div class="col-md-6">
                                <div role="form" class="wpcf7">
                                    <img src="https://bytuong.com/wp-content/uploads/2019/03/kinh-nghiem-mo-cua-hang-sach-van-phong-pham-bytuong-com.jpg" alt="" style="border-radius:20px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
