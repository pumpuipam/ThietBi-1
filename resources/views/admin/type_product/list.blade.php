@extends('layouts.admin.master')

@section('title', 'Thể loại')

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
                                    <h4 class="card-title">Danh sách thể loại</h4>
                                    <a href="{{ route('route_BackEnd_Type_Product_Create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên thể loại</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Mô tả</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($typeProduct as $type)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'TY000' . $type->id }}</th>
                                                    <td>
                                                        {{ $type->name }}
                                                         
                                                         
                                                    </td>
                                                    <td>
                                                        @if($type->image)
                                                            <img src="
                                                            {{asset($type->image)}}
                                                            " alt="Hình ảnh" style="width:50px; height:50px; border-radius:10px;">
                                                        
                                                        @else
                                                            <img src="
                                                           https://hienthao.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4.jpg
                                                            " alt="Hình ảnh" style="width:50px; height:50px; border-radius:10px;">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($type->description)
                                                            <span>{{ $type->description }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($type && $type->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @elseif ($type && $type->status === 2)
                                                            <span class="badge bg-warning">Không hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Khóa</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Type_Product_Edit', $type->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                            {{-- <a href="{{ route('route_BackEnd_Type_Product_Delete', $type->id) }}"
                                                                    class="btn btn-danger btn-sm">Xóa</a> --}}
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
                                    {{ $typeProduct->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
