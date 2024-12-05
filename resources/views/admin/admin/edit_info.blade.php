@extends('layouts.admin.master')

@section('title', 'Thông tin cá nhân')

@section('content')
<style>

    input[ type = "text"],input[type="email"]{
        border: 1px solid #dadada;
        padding: 0 20px;
        max-width: 100%;
        background-color: transparent;
        font-size: 14px;
        color: #868686;
        height: 40px;
        line-height: 40px;
        border-radius: 30px;
    }
    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }
    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }
    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }
    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }
    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }
    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }
    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }
    .account-settings .about p {
        font-size: 0.825rem;
    }
    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
    </style>
    <style>
        .avatar-wrapper {
            position: relative;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 1px 1px 15px -5px black;
            transition: all .3s ease;
            margin-left: 45px;
            margin-bottom:10px;
            &:hover {
                transform: scale(1.05);
                cursor: pointer;
            }

            &:hover .profile-pic {
                opacity: .5;
            }

            .profile-pic {
                height: 100%;
                width: 100%;
                transition: all .3s ease;

                &:after {
                    font-family: FontAwesome;
                    content: "\f007";
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    font-size: 100px;
                    background: #ecf0f1;
                    color: #34495e;
                    text-align: center;
                }
            }

            .profile-pic-2 {
                height: 100%;
                width: 100%;
                transition: all .3s ease;

                &:after {
                    font-family: FontAwesome;
                    content: "\f007";
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    font-size: 100px;
                    background: #ecf0f1;
                    color: #34495e;
                    text-align: center;
                }
            }

            .profile-pic-3 {
                height: 100%;
                width: 100%;
                transition: all .3s ease;

                &:after {
                    font-family: FontAwesome;
                    content: "\f007";
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    font-size: 100px;
                    background: #ecf0f1;
                    color: #34495e;
                    text-align: center;
                }
            }

            .upload-button {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;

                .fa-arrow-circle-up {
                    position: absolute;
                    font-size: 100px;
                    top: 25px;
                    left: 25px;
                    text-align: center;
                    opacity: 0;
                    transition: all .3s ease;
                    color: #34495e;
                }

                &:hover .fa-arrow-circle-up {
                    opacity: .9;
                }
            }

            .upload-button-2 {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;

                .fa-arrow-circle-up {
                    position: absolute;
                    font-size: 100px;
                    top: 25px;
                    left: 25px;
                    text-align: center;
                    opacity: 0;
                    transition: all .3s ease;
                    color: #34495e;
                }

                &:hover .fa-arrow-circle-up {
                    opacity: .9;
                }
            }

            .upload-button-3 {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;

            .fa-arrow-circle-up {
                    position: absolute;
                    font-size: 100px;
                    top: 25px;
                    left: 25px;
                    text-align: center;
                    opacity: 0;
                    transition: all .3s ease;
                    color: #34495e;
                }

                &:hover .fa-arrow-circle-up {
                    opacity: .9;
                }
            }
        }
</style>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="msg-box">
                            <?php //Hiển thị thông báo thành công
                            ?>
                            @if (Session::has('success'))
                                <div class="alert alert-success solid alert-dismissible fade show">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Thông tin cá nhân</h4>

                                <form action="{{route('user.updateUserInfo')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="card h-100">
                                        <div class="card-body shadow">
                                            <div class="account-settings">
                                                <div class="user-profile">
                                                    {{-- <div class="user-avatar">
                                                       
                                                            <img class="rounded-circle block-link" 
                                                                src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('client/assets/images/avatar1.jpg') }}"
                                                                alt="{{ Auth::user()->name }}">
                                                       
                                                            <img class="rounded-circle block-link" 
                                                                src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('client/assets/images/avatar1.jpg') }}"
                                                                alt="{{ Auth::user()->name }}">
                                                        @endif
                                                    </div> --}}
                                                    <div class="avatar-wrapper">
                                                        <img class="profile-pic-3" src="
                                                        
                                                            @if (Auth::user()->lastName)
                                                                {{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('client/assets/images/avatar1.jpg') }}
                                                                
                                                                @else
                                                                {{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('client/assets/images/avatar1.jpg') }}
                                                            @endif 
                                                            "
                                                        />
                                                        <div class="upload-button-3">
                                                            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                                        </div>
                                                        <input class="file-upload-3" name="avatar" type="file" accept="image/*" />
                                                    </div>
                                                    <h5 class="user-name">{{(auth()->user()->username)}}</h5>
                                                    <h6 class="user-email">{{(auth()->user()->email)}}</h6>
                                                </div>
                                                <div 
                                                class="about d-flex justify-content-center ml-4" style="align-items: center">
                                                    <h5 class="mr-4 mb-0 ">Trạng thái:</h5>
                                                    <p class="mb-0 " style=" align-items: center;">
                                                        @if((auth()->user()->status) == 1)
                                                        
                                                        Hoạt động
                                                        @elseif((auth()->user()->status) == 2)
                                                            Không hoạt động
                                                        @else
                                                            Khóa
                                                        @endif
            
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="card h-100">
                                        <div class="card-body shadow">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="fullName">Họ và tên</label>
                                                        <input type="text" class="form-control" id="fullName" name="username" placeholder="Nhập họ và tên" value="{{(auth()->user()->username)}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="fullName">Ngày sinh</label>
                                                        <input type="date" class="form-control " id="fullName" name="date" placeholder="Nhập date" value="{{(auth()->user()->birthday)}}" style="
                                                        border: 1px solid #dadada;
                                                            padding: 0 20px;
                                                            max-width: 100%;
                                                            background-color: transparent;
                                                            font-size: 14px;
                                                            color: #868686;
                                                            height: 40px;
                                                            line-height: 40px;
                                                            border-radius: 30px;"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="eMail">Email</label>
                                                        <input type="email" class="form-control" id="eMail"  placeholder="Nhập email" value="{{(auth()->user()->email)}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{(auth()->user()->phone)}}" required>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h6 class="mt-3 mb-2 text-primary">Thông tin địa chỉ</h6>
                                                </div>
                                            
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="sTate">Số nhà</label>
                                                        <input type="text" class="form-control" name="apartment_number" placeholder="Nhập tên đường" value="{{(auth()->user()->apartment_number)}}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="zIp">Địa chỉ</label>
                                                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ cá nhân"  value="{{(auth()->user()->address)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 mt-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="text-right"> 
                                                        <button class="btn btn-primary">Cập nhật thông tin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        
        $(document).ready(function() {

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            var readURL2 = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-pic-2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            var readURL3 = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-pic-3').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
            $(".file-upload").on('change', function() {
                readURL(this);
            });


            $(".upload-button-2").on('click', function() {
                $(".file-upload-2").click();
            });
            $(".file-upload-2").on('change', function() {
                readURL2(this);
            });
            $(".upload-button-3").on('click', function() {
                $(".file-upload-3").click();
            });
            $(".file-upload-3").on('change', function() {
                readURL3(this);
            });
        });
    </script>
@endsection
