@extends('layouts.client.master')

@section('title', 'Đăng ký')

@section('content')

    <main class="site-main  main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <div class="akasha-notices-wrapper"></div>
                            <div class="u-columns col2-set bg-white" id="customer_login">
                                <div class="u-column1 col-1">
                                    <figure class="banner-thumb">
                                        <img src="{{ asset('client/assets/images/banner-6.jpg') }}"
                                            class="attachment-full size-full" alt="img">
                                    </figure>
                                </div>
                                <div class="u-column2 col-2">
                                    <h2  style=" color:#C92127 !important;">Đăng ký</h2>
                                    <form action="{{ route('postRegister') }}" method="post"
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
                                                <span><i class="mdi mdi-help"></i></span>
                                                <strong>{{ Session::get('error') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="btn-close">
                                                </button>
                                            </div>
                                        @endif
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="name">Tên&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="akasha-Input akasha-Input--text input-text"
                                                name="username" id="name" autocomplete="name"
                                                value="{{ old('username', isset($request['username']) ? $request['username'] : '') }}">
                                            @error('username')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="reg_birthday">Ngày sinh&nbsp;<span class="required">*</span></label>
                                            <input type="date" class="akasha-Input akasha-Input--text input-text" style="border-radius:20px;
                                          "
                                                name="date" id="reg_birthday" autocomplete="date"
                                                value="{{ old('date', isset($request['date']) ? $request['date'] : '') }}">
                                            @error('date')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </p>
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="reg_birthday">Địa chỉ&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="akasha-Input akasha-Input--text input-text" style="border-radius:20px;
                                            "
                                                name="address" id="reg_birthday" autocomplete="address"
                                                value="{{ old('address', isset($request['address']) ? $request['address'] : '') }}">
                                            @error('address')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </p>
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
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input type="password" class="akasha-Input akasha-Input--text input-text"
                                                name="password" id="password" autocomplete="password" value="">
                                            @error('password')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-FormRow form-row">
                                            <button type="submit" class="akasha-Button button w-100 " style="   border-radius:20px; cursor: pointer;
                                            background:none;
                                            color:#C92127 !important;
                                            border:1px solid #C92127 !important;">Đăng ký
                                            </button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
