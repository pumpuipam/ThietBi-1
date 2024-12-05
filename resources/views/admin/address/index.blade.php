@extends('layouts.admin.master')

@section('title', 'Danh sách địa chỉ giao hàng')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
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
                            <?php //Hiển thị thông báo lỗi
                            ?>
                            @if (Session::has('error'))
                                <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                    <span><i class="mdi mdi-help"></i></span>
                                    <strong>{{ Session::get('errors') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">Danh sách địa chỉ giao hàng</h4>
                                    <a href="{{ route('address.create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên Tỉnh / Thành phố</th>
                                                <th scope="col">Tên Quận / huyện</th>
                                                <th scope="col">Tên Xã / phường</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($address as $add)
                                                <tr>
                                                    <td>ADR00{{ $add->id }}</td>
                                                    <td>{{ $add->Provinceid_AD->type }} - {{ $add->Provinceid_AD->name }}</td>
                                                    <td>{{ $add->City_AD->type }} - {{ $add->City_AD->name }}</td>
                                                    <td>{{ $add->Ward_AD->type }} - {{ $add->Ward_AD->name }}</td>
                                                    <td>{{ number_format($add->price) }} /vnđ</td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('address.edit', $add->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                        </div>
                                                    </td>

                                                </tr>
                                             
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
