@extends('layouts.admin.master')

@section('title', 'Danh sách bình luận')

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
                                <h4 class="card-title mb-4">Danh sách bình luận</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Số lượng bình luận</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $displayedProducts = [];
                                            @endphp

                                            @foreach ($comment as $cmt)
                                                @if (!in_array($cmt->product_id, $displayedProducts))
                                                    @php
                                                        $commentCount = 0;
                                                    @endphp

                                                    {{-- Tìm số lượng bình luận cho sản phẩm hiện tại --}}
                                                    @foreach ($comment as $commentItem)
                                                        @if ($commentItem->product_id == $cmt->product_id)
                                                            @php
                                                                $commentCount++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    {{-- Tìm sản phẩm tương ứng với bình luận --}}
                                                    @foreach ($products as $item)
                                                        @if ($item->id == $cmt->product_id)
                                                            <tr>
                                                                <th scope="row" class="text-primary">
                                                                    {{ 'PR000' . $item->id }}</th>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $commentCount }}</td>
                                                                <td>
                                                                    <div>
                                                                        <a href="{{ route('route_BackEnd_Comment_Edit', $item->id) }}"
                                                                            class="btn btn-primary btn-sm">Xem chi tiết bình
                                                                            luận</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            {{-- Đánh dấu sản phẩm này đã được hiển thị --}}
                                                            @php
                                                                $displayedProducts[] = $cmt->product_id;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            @if (empty($displayedProducts))
                                                <tr class="text-center text-danger">
                                                    <td colspan="3" style="color: red !important">Không có bản ghi</td>
                                                </tr>
                                            @endif

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
