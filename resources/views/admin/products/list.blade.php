@extends('layouts.admin.master')

@section('title', 'Danh sách sản phẩm')

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
                                    <h4 class="card-title">Danh sách sản phẩm</h4>
                                    @if(auth()->user()->role_id === 1)
                                    <a href="{{ route('route_BackEnd_Products_Create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                        @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên SP</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Số lượng sp</th>
                                                {{-- <th scope="col">Giảm giá</th> --}}
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Mô tả ngắn</th>
                                                <th scope="col">Trạng thái</th>
                                                @if(auth()->user()->role_id === 1)

                                                    <th scope="col">Hành động</th>
                                                    @else
                                                    <th>Chi tiết sản phẩm</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'PR000' . $product->id }}
                                                    </th>
                                                    <td>
                                                        <div>
                                                            @php
                                                                $limitedMessage = Str::limit($product->name, 30, '...');
                                                               
                                                            @endphp
                                                            <span></span>
                                                            <img src="
                                                            {{asset($product->image)}}
                                                            " alt="Hình ảnh" style="width:50px; height:50px; border-radius:10px;">

                                                            {!! $limitedMessage !!}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($product->price)
                                                            <span>{{ number_format($product->price) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($product->quantity)
                                                            <span>{{ $product->quantity }}</span>
                                                        @else
                                                            <span>0</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        @if ($product->discount)
                                                            <span>{{ number_format($product->discount) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        @if ($product->category_product)
                                                            <span>{{ $product->category_product->name }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($product->short_description)
                                                            @php
                                                                $limitedMessage = Str::limit(
                                                                    $product->short_description,
                                                                    20,
                                                                    '...',
                                                                );
                                                            @endphp
                                                            <span>{!! $limitedMessage !!}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($product && $product->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @elseif ($product && $product->status === 2)
                                                            <span class="badge bg-warning">Không hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Khóa</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Products_Edit', $product->id) }}"
                                                                class="btn btn-primary btn-sm">
                                                                @if(auth()->user()->role_id === 1)
                                                                Chỉnh sửa
                                                                @else
                                                                Xem chi tiết
                                                                @endif
                                                            </a>
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
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
