{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ $product->name }}</title>
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <!-- Flipbook StyleSheet -->
    <link href="
    {{ asset('assets/css/dflip.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Stylesheet -->
    <link
      href=" {{ asset('assets/css/themify-icons.min.css') }}"
      rel="stylesheet"
      type="text/css"
    />
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div style="display:flex; a">
            <h1 style="display:flex; justify-content:center; color:#C92127 !important;">{{ $product->name }}</h1>
          <a style="display:flex; justify-content:center; color:#C92127;">Quay lại trang chi tiết sản phẩm</a>
          </div>
          <!--Normal FLipbook-->
          <div
            class="_df_book"
            height="600"
            webgl="true"
            backgroundcolor="teal"
            source="{{ asset($product->pdf) }}"
            id="df_manual_book"
          >
        </div>
        </div>
      </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/libs/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/three.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/compatibility.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/mockup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/pdf.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/pdf.worker.min.js') }}" type="text/javascript"></script>
    <!-- Flipbook main Js file -->
    <script src="{{ asset('assets/js/dflip.min.js') }}" type="text/javascript"></script>

  </body>
</html> --}}

@extends('layouts.client.master')
<link href="
{{ asset('assets/css/dflip.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Icons Stylesheet -->
<link
  href=" {{ asset('assets/css/themify-icons.min.css') }}"
  rel="stylesheet"
  type="text/css"
/>

@section('title', 'Danh mục hàng hóa')


@section('content')
<style>
  .meta-dreaming{
    display: flex !important;
    align-items: center !important;
  }
  .block-link {
    display: flex !important;
    align-items: center !important;
  }
  .fa-solid{
    margin-left:10px !important;
  }
  .flaticon-bag{
    margin-left:10px !important;
  }
  .backtotop{
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>
<div class="container" style="margin-top:100px;">
  <div class="row">
    <div class="col-xs-12" style="width:100%; ">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1 style="display:flex; justify-content:center; color:#C92127 !important;">{{ $product->name }}</h1>
        <a href="{{ route('route_FrontEnd_Product_Detail',$id) }}" 
        style="display:flex; justify-content:center;color:white; border-radius:10px; padding:5px 5px;
        background-color:#C92127;">Quay lại trang chi tiết sản phẩm</a>
      </div>
     
      <div
        class="_df_book" style="margin-bottom:20px;"
        height="600"
        webgl="true"
        backgroundcolor="teal"
        source="{{ asset($product->pdf) }}"
        id="df_manual_book"
      >
    </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/libs/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/three.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/compatibility.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/mockup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/pdf.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/libs/pdf.worker.min.js') }}" type="text/javascript"></script>
    <!-- Flipbook main Js file -->
    <script src="{{ asset('assets/js/dflip.min.js') }}" type="text/javascript"></script>
@endsection