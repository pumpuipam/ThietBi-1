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
                                <div class="u-column2 col-2" style="float: none !important; width: calc(100% - 20px);">
                                    <h2>Quên mật khẩu</h2>
                                    <form action="{{ route('postPassword', $user_profile->id) }}" method="post"
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
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input class="akasha-Input akasha-Input--text input-text" type="password"
                                                name="new_password" id="password" placeholder="Nhập mật khẩu"
                                                autocomplete="current-password">
                                            @error('password')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="password">Enter Password&nbsp;<span class="required">*</span></label>
                                            <input class="akasha-Input akasha-Input--text input-text" type="password"
                                                id="confirm_password" placeholder="Nhập lại mật khẩu"
                                                autocomplete="current-password">
                                            @error('password')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-FormRow form-row">
                                            <button type="submit" class="akasha-Button button">Gửi
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

    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Mật khẩu mới không khớp!");
            } else {
                confirm_password.setCustomValidity("");
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

@endsection

