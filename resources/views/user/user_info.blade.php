@extends('layouts.client.master')

@section('title', 'Danh mục hàng hóa')

@section('content')
    <style>
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
            margin-bottom: 10px;

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
    <div class="main-container shop-page left-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="container">

                    <form action="{{ route('user.updateUserInfo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="card h-100"
                                    @if ($User->level_user == 'broze') {{-- style ="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20190826/pngtree-pestel-triangular-diamond-blue-background-image_304557.jpg')" --}}
                                    @elseif($User->level_user == 'silver')
                                        style ="background-image: url('https://st2.depositphotos.com/3503231/8197/v/450/depositphotos_81974032-stock-illustration-gray-grid-mosaic-background-creative.jpg')"
                                    @elseif($User->level_user == 'gold')
                                        style ="background-image: url('https://png.pngtree.com/background/20220727/original/pngtree-abstract-golden-triangular-vector-background-picture-image_1833139.jpg')"
                                    @elseif($User->level_user == 'diamond')
                                    style ="background-image: url('https://media.istockphoto.com/id/485149990/vector/vector-low-poly-background-abstract-diamond-background-in-violet-colors.jpg?s=612x612&w=0&k=20&c=3f1EdfEYUqoLWdrtCftctGxKCI7mX10HjgNTAdJZcNs=')" @endif>
                                    <div class="card-body shadow">
                                        <div class="account-settings">
                                            <div class="user-profile">

                                                <div class="avatar-wrapper">
                                                    <img class="profile-pic-3"
                                                        src="
                                            
                                                @if (Auth::user()->lastName) {{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png' }}
                                    
                                                    @else
                                                    {{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png' }} @endif 
                                                " />
                                                    <div class="upload-button-3">
                                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="file-upload-3" name="avatar" type="file"
                                                        accept="image/*" />
                                                </div>
                                                <h5 class="user-name mt-5" style="font-size:14px;">
                                                    <p>Điểm kinh nghiệm</p>
                                                    @php 
                                                        use App\Models\setting;
                                                        $width = 0;
                                                        if($User->level_user != 'diamond'){
                                                            $check_setting = setting::where('name',$User->level_user)->first();
                                                            $id_check = setting::find($check_setting->id + 1);
                                        
                                                            $int_check = (int)$id_check->points;
                                                            $int_user = (int)auth()->user()->vip;
                                                            $width = ($int_user / $int_check)*100;
                                                        }else{
                                                            $width = 100;
                                                        }
                                                      
                                                  
                                                    @endphp
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $width }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                      </div>
                                                    <img @if ($User->level_user == 'broze') src="/huy/dong.png" 
                                                        @elseif($User->level_user == 'silver')
                                                            src="/huy/bac.png" 
                                                        @elseif($User->level_user == 'gold')
                                                            src="/huy/vang_1.png" 
                                                        @elseif($User->level_user == 'diamond')
                                                            src="/huy/kc.png" @endif
                                                        alt="" style="width:50px; height:50px;">
                                                    {{ auth()->user()->username }}
                                                </h5>
                                                <h6 class="user-email " style="font-size:12px; color:black;">
                                                    {{ auth()->user()->email }}</h6>
                                            </div>
                                            <div class="about d-flex ml-4" style="align-items: center; color:black;">
                                                <p class="mr-2 mb-0">Trạng thái:</p>
                                                <p class="mb-0 " style=" align-items: center; font-weight:bold">
                                                    @if (auth()->user()->status == 1)
                                                        Đang Hoạt động
                                                    @elseif(auth()->user()->status == 2)
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
                                                <h6 class="mb-2 " style="color:#C92127 !important">Thông tin cá nhân</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="fullName">Họ và tên</label>
                                                    <input type="text" class="form-control" id="fullName"
                                                        name="username" placeholder="Nhập họ và tên"
                                                        value="{{ auth()->user()->username }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <div class="form-group">
                                                    <label for="fullName">Ngày sinh</label>
                                                    <input type="date" class="form-control " id="fullName"
                                                        name="date" placeholder="Nhập date"
                                                        value="{{ auth()->user()->birthday ?? auth()->user()->date }}"
                                                        style="
                                            border: 1px solid #dadada;
                                                padding: 0 20px;
                                                max-width: 100%;
                                                background-color: transparent;
                                                font-size: 14px;
                                                color: #868686;
                                                height: 40px;
                                                line-height: 40px;
                                                border-radius: 30px;">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="eMail">Email</label>
                                                    <input type="email" class="form-control" id="eMail"
                                                        placeholder="Nhập email" value="{{ auth()->user()->email }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Số điện thoại</label>

                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        placeholder="Enter phone number"
                                                        value="{{ auth()->user()->phone }}" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mt-3 mb-2 " style="color:#C92127 !important">Thông tin địa chỉ
                                                </h6>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="sTate">Số nhà</label>
                                                    <input type="text" class="form-control" name="apartment_number"
                                                        placeholder="Nhập tên đường"
                                                        value="{{ auth()->user()->apartment_number }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="zIp">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Nhập địa chỉ cá nhân"
                                                        value="{{ auth()->user()->address }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="text-right">
                                                    <button
                                                        style="
                                            font-weight:bold;
                                            background:white;
                                            color:#C92127; 

                                            border:1px solid #C92127 !important;">Cập
                                                        nhật thông tin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
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
