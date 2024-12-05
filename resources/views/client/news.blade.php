@extends('layouts.client.master')

@section('title', 'Tin tức')

@section('content')
    <style>
        .home-blog {
    padding-top: 80px;
    padding-bottom: 80px;
}
@media (min-width: 992px) {
    .home-blog {
        padding-top: 100px;
        padding-bottom: 100px;
    }
}
.home-blog .section-title {
    padding-bottom: 15px;
}
.home-blog .media {
    margin-top: 50px;
}
@media (min-width: 768px) {
    .home-blog .media {
        margin-top: 30px;
    }
}
/* .bg-sand {
    background-color: #f5f5f6;
} */
.media.blog-media {
    margin-top: 30px;
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media {
        display: table;
    }
}
.media.blog-media .circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    white-space: nowrap;
    position: absolute;
    padding: 0;
    top: 20px;
    left: 20px;
    text-align: center;
    box-shadow: none;
    transform: translateX(0);
    color: #fff;
    transition: background-color 0.3s ease;
}
.media.blog-media .circle .day {
    color: #fff;
    transition: color 0.25s ease;
    font-weight: 500;
    font-size: 28px;
    line-height: 1;
    margin-top: 12px;
}
.media.blog-media .circle .month {
    text-transform: uppercase;
    font-size: 14px;
}
.media.blog-media > a {
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media > a {
        display: table-cell;
        vertical-align: top;
        min-width: 200px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media > a {
        width: 210px;
    }
}
.media.blog-media > a:before {
    position: absolute;
    content: "";
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    opacity: 0;
    transform: scale(0);
    transition: transform 0.3s ease, opacity 0.3s;
    background: rgba(238, 250, 243, 0.353);
}
.media.blog-media > a img {
    width: 100%;
    height: 100% !important;
    object-fit: cover;
}
.media.blog-media:hover > a:before {
    opacity: 1;
    transform: scale(1);
}
.media.blog-media:hover .circle {
    background-color: rgba(255, 255, 255, 0.9);
}
.media.blog-media:hover .circle .day,
.media.blog-media:hover .circle .month {
    color: #222;
}
.media.blog-media:hover .media-body h5 {
    color: #C92127 !important;
}
/* .media.blog-media .media-body a.post-link :hover{
    color: white !important;
    background: #C92127 !important;

   
} */

.media.blog-media .media-body {
    border: 1px solid #efeff3;
    padding: 30px 30px 10px;
    font-size: 14px;
    background: #fff;
    border-top: none;
}
@media (min-width: 992px) {
    .media.blog-media .media-body {
        padding: 15px 20px 10px;
        border-top: 1px solid #efeff3;
        border-left: none;
        display: table-cell;
        vertical-align: top;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body {
        padding: 30px 20px 10px;
    }
}
.media.blog-media .media-body h5 {
    transition: color 0.3s ease;
    margin-bottom: 15px;
}
@media (min-width: 992px) {
    .media.blog-media .media-body h5 {
        font-size: 15px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body h5 {
        margin-bottom: 15px;
        font-size: 18px;
    }
}
.media.blog-media .media-body a.post-link {
    display: block;
    color: #222;
    font-size: 11px;
    padding: 23px 0;
    text-transform: uppercase;
    font-weight: 400;
}
@media (min-width: 992px) {
    .media.blog-media .media-body a.post-link {
        padding: 7px 0;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body a.post-link {
        padding: 23px 0;
    }
}
.media.blog-media .media-body ul {
    position: relative;
    padding: 10px 0 0;
}
.media.blog-media .media-body ul li {
    display: inline-block;
    width: 49%;
    position: relative;
}
.media.blog-media .media-body ul li:before {
    position: absolute;
    content: "";
    top: 5px;
    left: 0;
    width: 1px;
    height: 14px;
    background: #eeeef2;
}
.media.blog-media .media-body ul li:first-child:before {
    visibility: hidden;
}
.media.blog-media .media-body ul:before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #eeeef2;
}

.main-container{
    padding-top: 50px !important;
}
    </style>
    {{-- <div class="banner-wrapper has_background">
        <img src="{{ asset('client/assets/images/banner-for-all2.jpg') }}"
            class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner">
            <h1 class="page-title">Tin tức</h1>
        </div>
    </div> --}}
    <div class="main-container no-sidebar" style="padding-top: 140px">
        
        <!-- POST LAYOUT -->
        {{-- <div class="container">
            <div class="row">
                <div class="main-content col-md-12 col-sm-12">
                    <div class="blog-grid auto-clear content-post row">
                        @foreach ($news as $new)
                            <article
                                class="post-item post-grid col-bg-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-ts-12 post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}">
                                            <img style="height: 250px"
                                                src="{{ asset($new->images) ? '' . Storage::url($new->images) : $new->title }}"
                                                class="img-responsive attachment-370x330 size-370x330"
                                                alt="{{ $new->title }}" width="370" height="330"> </a>
                                       
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <div class="post-author">
                                                Đăng bởi:<a href="#">
                                                    {{ $new->admin->username }} </a>
                                            </div>
                                        </div>
                                        <div class="post-info equal-elem">
                                            <h2 class="post-title"><a
                                                    href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}">{{ $new->title }}</a>
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
        </div> --}}

        <section class="home-blog bg-sand">
         
            <div class="container">
                <div  >
                    <ul class="trail-items breadcrumb" style="background: none; ">
                        <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_Home') }}" style="font-weight:bold;"><span>Trang chủ</span></a></li>
                        <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="trail-item trail-end active"><span>Bài viết</span>
                        </li>
                    </ul>
                </div>
                <!-- section title -->
                <div class="row justify-content-md-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="section-title text-center title-ex1">
                            <h2>Danh mục bài viêt</h2>
                          
                        </div>
                    </div>
                </div>
                <!-- section title ends -->
                <div class="row ">
                    @foreach ($news as $new)
                        <div class="col-md-6">
                            <div class="media blog-media"  style="border-radius:20px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; width:100%; height:240px;">
                            <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}">
                                <img class="d-flex" src="{{ asset($new->images) ? '' . Storage::url($new->images) : $new->title }}" alt="Generic placeholder image" style="border-top-left-radius:20px; border-bottom-left-radius:20px;">
                            </a>
                            
                            <div class="media-body" style="border-top-right-radius:20px; border-bottom-right-radius:20px;">
                                <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}">
                                    <h5 class="mt-0" style="  color:#C92127 !important;">{{ \Illuminate\Support\Str::limit($new->title,20) }}</h5></a>
                               
                                {{ \Illuminate\Support\Str::limit($new->short_desc,70) }}
                                <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}"
                                     class="post-link"  style="font-weight:bold;
                                     border:1px solid #C92127 !important;
                                     width:100px;
                                     text-align:center;
                                     padding:5px 10px !important;
                                     margin:10px 0px;
                                     color:#C92127 !important;
                                     border-radius:10px;
                                     "
                                     >Xem ngay</a>
                                <ul>
                                    <li>Tạo bởi: {{ $new->admin->username }}</li>
                                    
                                </ul>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>

@endsection
