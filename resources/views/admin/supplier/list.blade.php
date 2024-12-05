@extends('layouts.admin.master')

@section('title', 'Danh sách nhà cung cấp')

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
                                    <h4 class="card-title">Danh sách nhà cung cấp</h4>

                                    @if(auth()->user()->role_id === 1)

                                        <a href="{{ route('route_BackEnd_Suppliers_Create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên nhà cung cấp</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Trạng thái</th>
                                                @if(auth()->user()->role_id === 1)

                                                <th scope="col">Hành động</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($suppliers as $supplier)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'CU000' . $supplier->id }}
                                                    </th>
                                                    <td>
                                                        {{ $supplier->name }}
                                                    </td>
                                                    <td>
                                                        @if ($supplier->email)
                                                            <span>{{ $supplier->email }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($supplier->phone)
                                                            <span>{{ $supplier->phone }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($supplier && $supplier->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @elseif ($supplier && $supplier->status === 2)
                                                            <span class="badge bg-warning">Không hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Khóa</span>
                                                        @endif
                                                    </td>
                                                    @if(auth()->user()->role_id === 1)

                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Suppliers_Edit', $supplier->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                            <a href="{{ route('route_BackEnd_Suppliers_Delete', $supplier->id) }}"
                                                                    class="btn btn-danger btn-sm">Xóa</a>
                                                        </div>
                                                       
                                                    </td>
                                                    @endif
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
                                    {{ $suppliers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
