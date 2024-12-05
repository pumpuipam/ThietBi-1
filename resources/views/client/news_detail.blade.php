@extends('layouts.client.master')

@section('title', 'Chi tiết bài viết')

@section('content')

    <div class="main-container left-sidebar has-sidebar" style="padding-top: 140px">
        <!-- POST LAYOUT -->
        <div class="container">
            <div class="row">
                <div class="main-content col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div >
                        <ul class="trail-items breadcrumb" style="background: none; ">
                            <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_Home') }}" style="font-weight:bold;"><span>Trang chủ</span></a></li>
                            <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="trail-item trail-begin"><a href="{{ route('route_FrontEnd_News') }}" style="font-weight:bold;"z><span>Bài viết</span></a></li>
                            <li class="ml-3 mr-3" style="font-weight:bold;"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="trail-item trail-end active"><span>{{ $new->title }}</span>
                            </li>
                        </ul>
                    </div>
                    <article
                        class="post-item post-single post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                        <div class="single-post-thumb">
                            <div class="post-thumb">
                                <img src="{{ asset($new->images) ? '' . Storage::url($new->images) : $new->title }}"
                                    class="attachment-full size-full wp-post-image" alt="img">
                            </div>
                        </div>
                        <div class="single-post-info">
                            <h2 class="post-title"><a href="#">{{ $new->title }}</a></h2>
                            <div class="post-meta">
                                <div class="date">
                                    <a href="#">{{ $new->created_at }} </a>
                                </div>
                                <div class="post-author">
                                    Đăng bởi:<a href="#"> {{ $new->admin->username }} </a>
                                </div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div id="output">
                                <blockquote>
                                    <p>{{ $new->short_desc }}</p>
                                </blockquote>
                                <p>{!! $new->description !!}</p>

                            </div>
                        </div>
                       
                    </article>
                </div>
                {{-- <div class="sidebar akasha_sidebar col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div id="widget-area" class="widget-area sidebar-blog">
                        <div id="search-3" class="widget widget_search">
                            <form role="search" method="get" class="search-form">
                                <input class="search-field" placeholder="Your search here…" value="" name="s"
                                    type="search">
                                <button type="submit" class="search-submit"><span class="fa fa-search"
                                        aria-hidden="true"></span></button>
                                <input name="lang" value="en" type="hidden">
                            </form>
                        </div>
                        <div id="categories-3" class="widget widget_categories">
                            <h2 class="widgettitle">Danh mục bài viết<span class="arrow"></span></h2>
                            <ul>
                                <li class="cat-item cat-item-51"><a href="#">Shoes</a>
                                </li>
                                <li class="cat-item cat-item-49"><a href="#">Fashion</a>
                                </li>
                                <li class="cat-item cat-item-52"><a href="#">Bags</a>
                                </li>
                                <li class="cat-item cat-item-53"><a href="#">Collection</a>
                                </li>
                                <li class="cat-item cat-item-50"><a href="#">Life
                                        Style</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .widget-area -->
                </div> --}}
            </div>
        </div>
    </div>

@endsection
