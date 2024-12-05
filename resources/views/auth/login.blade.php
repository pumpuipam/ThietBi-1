<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Login | Đồ da dụng - Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Design by Thang Developer" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>
<style>
    .text-primary {
        color: #6b60c6;
    }

    .background-primary {
        background: #6b60c6;
    }

    .background-primary:hover {
        border: 2px solid #6b60c6;
        transition: 0.5s;
    }

    .background-primary:hover i {
        color: #6b60c6;
    }

    .background-primary:hover i {
        color: #6b60c6 !important;
    }

    .background-primary:hover p {
        color: #6b60c6 !important;
    }

    img {
        width: 100vw;
        height: 100vh;
    }

    /* .card-frame {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    } */
    img {
        /* position: relative; */
        width: 100%;
    }
    
    .img_logo {
        width: 100px !important;
        padding: 5px 0px;
        /* margin: 0 auto; */
    }
    @media (max-width: 1200px) {
        /* h4{
            display:flex;

        } */
    }
    @media (max-width: 770px) {
        .img_logo{
            display:none;

        }
    }
</style>
<body style="background-image: linear-gradient(to left, #a960c6, #ffffff); ">

    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('getLogin') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Đăng nhập vào quản trị.</p>
                                <a href="{{ route('getLogin') }}" class="logo logo-admin">
                                    <img src="{{ asset('admin/assets/images/aa.jfif') }}" height="100%" width="100%"
                                        style="border-radius: 49px" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="{{ route('postLogin') }}" method="post">
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
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="text" class="form-control" name="email" id="username"
                                            placeholder="hello@example.com"
                                            value="{{ old('email', isset($request['email']) ? $request['email'] : '') }}">
                                        @error('email')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="userpassword"
                                            placeholder=".....">
                                        @error('password')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="#!"><i class="mdi mdi-lock"></i> Quên mật khẩu?</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                


                </div>
            </div>
        </div> --}}
    </div>
    <main class="main-content  mt-0" style="margin-left:120px !important;">
        {{-- <img src="{{ asset('images/avatar_login.jpg') }}" class="position-absolute " alt="" style="opacity:0.3;"> --}}
       
            <div class="page-header min-vh-100" style="">
                <div class="container-fluid">

                    <div class="row" style="">
                        <div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-frame  d-flex justify-content-center"
                                style="
                                 box-shadow: 2px 0px 12px #6b60c6;
                                 width:400px; ">
                                <div class="card-header pb-0 text-start text-md-center"
                                    style="padding:0px; margin-top:10px;">
                                    {{-- <img src="{{ asset('images/Logo-Mastery.png') }}" class="img_logo"
                                        alt="user1" style="witdh:50% !important; height:70px !important;"> --}}
                                    <h4 class="d-flex justify-content-center"
                                        style="font-size:20px; margin-bottom:0px; margin-top:10px; color: #6b60c6; background:none;">Đăng nhập</h4>
                                </div>
                                <div class="card-body"
                                    style="padding-top:0px !important; padding-bottom:0px !important;">
                                    <form method="POST" action="{{ route('postLogin') }}">
                                        @csrf
                                        
                                        <div class="row">
                                            <label for="email"class="col-md-4 col-form-label float-left"
                                                style="font-size:13px;">{{ __('Email') }}</label>

                                            <div class="col-md-12">
                                                <input id="email" type="email" placeholder="Nhập Email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus
                                                    style="    padding-bottom: 6px;
                                                    padding-top: 6px;
                                                ">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            <label for="password" class="col-md-4 col-form-label  float-left"
                                                style="font-size:13px;">{{ __('Mật khẩu') }}</label>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group input-group-alternative mb-4">
                                                        <input
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Nhập mật khẩu" type="password"
                                                            onfocus="focused(this)" name="password" id="myInput"
                                                            required onfocusout="defocused(this)"
                                                            style="    padding-bottom: 6px;
                                                    padding-top: 6px;
                                                ">

                                                    </div>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-flex" style="">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="fcustomCheck1" onclick="myFunction()">
                                                    <label class="custom-control-label" for="customCheck1">Xem mật khẩu</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="text-center ">
                                                <button type="submit"
                                                    class="btn btn-lg background-primary btn-lg w-100 mt-4 mb-4"
                                                    style="color:white; margin-top:0px !important; padding:8px 5px;">
                                                    <p style="font-size:14px; margin-bottom:0px;"> Đăng nhập</p>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 
                            position-absolute top-0 end-0 text-center justify-content-center flex-column" style="bottom:250px;">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://img6.thuthuatphanmem.vn/uploads/2022/04/15/anh-nen-ke-sach-dep-nhat_022005271.jpg'); 
                                background-size: cover; height:60% !important; width:75% !important; border-radius:20px; opacity:0.8;    ">
                                <span class="mask bg-gradient-primary opacity-6"></span>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
     
    </main>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
