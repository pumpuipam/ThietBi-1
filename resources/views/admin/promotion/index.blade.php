@extends('layouts.admin.master')

@section('title', 'Danh sách khuyến mãi')

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
                                    <h4 class="card-title">Danh sách khuyến mãi</h4>
                                    <a href="{{ route('promotion.create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                </div>
                               
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên KM</th>
                                            <th scope="col">Mã KM</th>
                                            <th scope="col">Số lượng KM</th>
                                          
                                            <th scope="col">Số tiền</th>
                                    
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Promotion as $Pro)
                                            <tr>
                                                <td>KM000{{ $Pro->id }}</td>
                                                <td>{{ $Pro->name }}</td>
                                                <td>{{ $Pro->code }}</td>
                                                <td>{{ $Pro->quantity }}</td>
                                                <td>{{ number_format($Pro->total) }} /vnđ</td>
                                                <td>
                                                    @if ($Pro && $Pro->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @elseif ($Pro && $Pro->status === 2)
                                                            <span class="badge bg-warning">Không hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Khóa</span>
                                                        @endif
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('promotion.edit', $Pro->id) }}"
                                                            class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                    </div>
                                                </td>



                                            </tr>
                                        @empty
                                            <tr class="text-center text-danger">
                                                <td colspan="12" style="color: red !important">Không có bản ghi</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $Promotion->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection