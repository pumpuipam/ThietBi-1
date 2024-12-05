@extends('layouts.client.master')

@section('title', 'Đăng nhập')

@section('content')

    <main class="site-main  main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <div class="u-columns col2-set" id="customer_login">
                                <div class="u-column1 col-1" style="border-radius:20px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <h2>Quên mật khẩu</h2>
                                    <form action="{{ route('postforgetPassword') }}" method="post"
                                        class="akasha-form akasha-form-register register">
                                        @csrf
                                        @if (Session::has('success'))
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>{{ Session::get('success') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div
                                                class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                                <strong>{{ Session::get('error') }}</strong>
                                            </div>
                                        @endif
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="reg_email">Email&nbsp;<span class="required">*</span></label>
                                            <input type="email" class="akasha-Input akasha-Input--text input-text"
                                                name="email" id="reg_email" autocomplete="email"
                                                value="{{ old('email', isset($request['email']) ? $request['email'] : '') }}">
                                            @error('email')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-FormRow form-row">
                                            <button type="submit" class="akasha-Button button" style="border-radius:20px; cursor: pointer;">Gửi
                                            </button>
                                        </p>
                                    </form>
                                </div>
                                @php
                                $bg = asset('client/assets/images/banner-5.jpg')
                                @endphp
                            <div 
                            class="u-column2 col-2 p-0 position-relative img-container" 
                            style="border-radius:20px; 
                            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; 
                            background-image: url('{{ $bg }}'); background-size: cover; 
                            background-position: center;
                            cursor: pointer;
                            ">

                            <div style="position: absolute; width: 100%; border-radius:20px; height: 100%; top: 0; background:#FAACA8; opacity:0.6; cursour:pointer;">



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
