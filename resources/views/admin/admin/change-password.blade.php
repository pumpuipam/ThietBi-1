@extends('layouts.admin.master')

@section('title', 'Thay đổi mật khẩu')

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

                                <h4 class="card-title mb-4">Thay đổi mật khẩu</h4>

                                <div class="center d-flex justify-content-center">

                                    <div class="" style="margin-top:10px; width:50%;">
            
                                        <div class="row mt-0" style="margin-top:10px;">
                                            <label for="password" class="col-md-4 col-form-label  float-left"
                                                style="font-size:13px;"> Mật khẩu cũ</label>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group has-success mb-2">
            
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Nhập lại mật khẩu cũ" type="password" onfocus="focused(this)"
                                                            name="password" id="myInput" required onfocusout="defocused(this)"
                                                            style="    padding-bottom: 6px;
                                                            padding-top: 6px;
                                                        ">
                                                        <span class="input-group-text " onclick="myFunction3()"> <img
                                                                src="{{ Storage::url('customers/icons8-eye-64.png') }}"
                                                                style="width: 20px;height: 20px;"></span>
                                                    </div>
                                                    {{-- <div style="">
                                                        <div class="form-check mb-2 align-items-center">
                                                            <input class="form-check-input mr-2" type="checkbox" value=""
                                                                id="fcustomCheck1" onclick="myFunction1()">  Hiển thị mật khẩu
                                                        </div>
            
                                                    </div> --}}
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="row mt-0" style="margin-top:10px;">
                                            <label for="password" class="col-md-4 col-form-label  float-left"
                                                style="font-size:13px;">Mật khẩu mới</label>
                                            <div class="col-md-12">
                                                <div class="form-group" style="width:100%;">
                                                    <div class="input-group has-success mb-2">
            
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Mật khẩu mới" type="password" onfocus="focused(this)"
                                                            name="new_password" id="myInput_1" required
                                                            onfocusout="defocused(this)"
                                                            style="    padding-bottom: 6px;
                                                    padding-top: 6px;
                                                ">
                                                        <span class="input-group-text " onclick="myFunction1()"> <img
                                                                src="{{ Storage::url('customers/icons8-eye-64.png') }}"
                                                                style="width: 20px;height: 20px;"></span>
                                                    </div>
                                                    {{-- <div style="">
                                                        <div class="form-check mb-2 align-items-center">
                                                            <input class="form-check-input mr-2" type="checkbox" value=""
                                                                id="fcustomCheck1" onclick="myFunction1()">  Hiển thị mật khẩu
                                                        </div>
            
                                                    </div> --}}
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="row mt-0" style="margin-top:10px;">
                                            <label for="password" class="col-md-12 col-form-label  float-left"
                                                style="font-size:13px;">Nhập lại mật khẩu mới</label>
                                            <div class="col-md-12">
                                                <div class="form-group mb-0" style="width:100%;">
                                                    <div class="input-group has-success mb-2">
            
                                                        <input class="form-control  @error('password') is-invalid @enderror"
                                                            placeholder="Nhập lại mật khẩu mới" type="password" onfocus="focused(this)"
                                                            name="retype_new_password" id="myInput_2" required
                                                            onfocusout="defocused(this)"
                                                            style="    padding-bottom: 6px;
                                                    padding-top: 6px; ">
                                                        <span class="input-group-text " onclick="myFunction2()"> <img
                                                                src="{{ Storage::url('customers/icons8-eye-64.png') }}"
                                                                style="width: 20px;height: 20px;"></span>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <p class="ml-1 text-danger d-none" id="checkmk">Mật khẩu không chính xác</p>
                                        </div>
                                        <div class="row mt-0 mt-3 mb-4 " style="margin-top:10px;">
                                            <div class="col-md-12">
                                                <button type="submit" onclick="postPassword()"
                                                    class="btn btn-primary btn-lg btn-lg w-100 mt-4 mb-4"
                                                    style=" margin-top:0px !important; padding:8px 0px; border-radius:20px;";>
                                                    <p style="font-size:14px; margin-bottom:0px; color:white;">Thay đổi mật khẩu</p>
                                                </button>
                                            </div>
                                        </div>
            
                                    </div>
            
                                </div>
                                <!-- end form -->
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function postPassword() {
            var value_1 = $('#myInput_1').val();
            var value_2 = $('#myInput_2').val();
            var value = $('#myInput').val();
            if (value != '') {
                if (value_1 != value_2) {
                    $('#checkmk').removeClass('d-none');
                } else {
                    var formData = new FormData();
                    formData.append('new_password', value_1);
                    formData.append('retype_new_password', value_2);
                    formData.append('password', $('#myInput').val());
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('id', '{{ auth()->user()->id }}');
                    $.ajax({
                        contentType: false,
                        processData: false,
                        cache: false,
                        url: '{{ route('admin.checkChangePassword') }}',
                        method: 'POST',
                        data: formData,
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: "Thay đổi thành công",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function() {
                                    window.location.href = "/login_admin";
                                }, 2000);
                            }
                            else{
                                Swal.fire({
                                    icon: 'error',
                                    title: "Thay đổi thất bại",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // setTimeout(function() {
                                    // window.location.reload();
                                // }, 2000);
                            }

                        }

                    });
                }

            }

        }

        function myFunction3() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction1() {
            var x = document.getElementById("myInput_1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("myInput_2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
   
@endsection
