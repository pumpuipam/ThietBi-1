@extends('layouts.admin.master')

@section('title', 'Nhập kho')

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
                        @php
                           use Carbon\Carbon;
                        @endphp
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">Danh sách nhập kho</h4>
                                    <a href="{{ route('inventory.create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                </div>
                               
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Người lập</th>
                                            <th scope="col">Nhà cung cấp</th>
                                            <th scope="col">Tổng số tiền</th>
                                            <th scope="col">Tổng số lượng sản phẩm</th>
                                            <th scope="col">Ngày lập</th>

                                            <th scope="col">Trạng thái</th>
                                            <th class="text-center" scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Inventory as $Pro)
                                            
                                            <tr>
                                                <td>NK000{{ $Pro->id }}</td>
                                                <td>{{ $Pro->User->username }}</td>
                                                <td>{{ $Pro->Supplier->name }}</td>
                                                <td>{{ number_format($Pro->quantity) }}</td>
                                                <td>{{ number_format($Pro->total) }}</td>
                                                <td>
                                                    {{ Carbon::parse($Pro->created_at)->format('d-m-Y H:i:s') }}
                                                </td>
                                                <td class="text-success">
                                                    @if($Pro->status == 1)
                                                    Chưa duyệt
                                                    @else 
                                                    Đã duyệt
                                                    @endif
                                                </td>
                                                <td class=" text-center ">

                                                    @if($Pro->status == 1)
                                                        @if(auth()->user()->role_id === 1)

                                                            <a class="btn btn-success" href="{{ route('inventory.argee',$Pro->id) }}">Duyệt phiếu nhập</a>
                                                            <a class="btn btn-danger" href="{{ route('inventory.delete',$Pro->id) }}"><i class="fa-solid fa-trash"></i></a>
                                                        @endif
                                                        
                                                        <a class="btn btn-info"  href="{{ route('inventory.edit',$Pro->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    @else
                                                        <i class="text-success fa-solid fa-check" style="margin-right:10px !important;"></i>
                                                        <a class="btn btn-info"  href="{{ route('inventory.edit',$Pro->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                                                        
                                                    @endif
                                                   

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
                                {{ $Inventory->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection