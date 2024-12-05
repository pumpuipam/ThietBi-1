@extends('layouts.client.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')

    <div class="main-container shop-page left-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="container">

                    <div class="col-xl-12 mb-4">
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
                                <h4 class="card-title mb-4">Danh sách chi tiết đơn hàng</h4>
                                <div class="header-logo text-center">
                                    <a href="/"><img alt="Akasha" src="{{ asset('client/assets/images/564e4c03-437c-4c88-9a8d-2d8fcf267155-removebg-preview.png') }}"
                                            class="" style="width:200px;"></a>
                                </div>
                                @php
                                    $displayedUserId = null;
                                @endphp

                                @foreach ($orderDetail as $item)
                                    @if ($displayedUserId !== $item->user->id)
                                        <div class="d-flex">
                                            <div style="flex: 0 0 50%;">
                                                <p>
                                                    <span>Tài khoản mua hàng: <b>{{$username}}</b></span>
                                                </p>
                                                <p>
                                                    <span>Họ tên người đặt: <b> {{ $orders->firstName }} {{$orders->lastname}}</b></span>
                                                </p>
                                                <p>
                                                    <span>Email: <b>{{ $orders->email }}</b></span>
                                                </p>
                                                <p>
                                                    <span>Tỉnh/Thành phố: <b>{{($orders->Provinceid_AD->name 
                                                    ?? '')  }}</b></span>
                                                </p>
                                                <p>
                                                    <span>Quận/Huyện: <b>{{($orders->City_AD->name ?? '')  }}</b></span>
                                                </p>
                                                <p>
                                                    <span>Xã/Phường: <b>{{($orders->Ward_AD->name ?? '')  }}</b></span>
                                                </p>
                                                <p>
                                                    <span>Địa chỉ: <b>{{ $orders->address }}</b></span>
                                                </p>
                                               
                                                
                                            </div>
                                            <div style="flex: 0 0 50%;">
                                                <p>
                                                    <span>Số điện thoại: <b>{{ $orders->phone }}</b></span>
                                                </p>
                                                <p>
                                                    <span>Ghi chú: <b>{{ $orders->note ?: '' }}</b></span>
                                                </p>
                                                <p>
                                                    <span>Phương thức thanh toán: <b>{{ $orders->payment_type  == 1 ? 'COD' : 'VNPay' }}</b></span>
                                                </p> 
                                                <p> Trạng thái
                                                    @if ($orders && $orders->status === 0)
                                                    <span class="badge bg-warning text-white">Đang chờ</span> 
                                                    @elseif($orders && $orders->status === 2)
                                                        <span class="badge bg-danger text-white">Huỷ</span>
                                                    @elseif($orders && $orders->status === 3)
                                                        <span class="badge bg-info text-white">Đang giao</span>
                                                    @elseif($orders && $orders->status === 4)
                                                        <span class="badge bg-info text-white">Đã nhận hàng</span>
                                                    @elseif($orders && $orders->status === 5)
                                                        <span class="badge bg-info text-white">Đơn hàng đang giao</span>
                                                    @else 
                                                        <span class="badge bg-success text-white">Đã nhận hàng</span>
                                                    @endif
                                                </p>
                                                @if($orders->discount_product)
                                                <p>
                                                    <span>Đã sử dụng voucher: <b class="p-1 bg-danger text-white" style="border-radius:10px;">
                                                        {{ ($orders->discount_product->code) }}
                                                    </b>
                                                </span>
                                                    
                                                </p>

                                            @endif
                                               
                                            </div>
                                        </div>
                                        @php
                                            $displayedUserId = $item->user->id;
                                        @endphp
                                    @endif
                                @endforeach

                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên SP</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Giá</th>
                                                {{-- <th scope="col">Giảm giá</th> --}}
                                                <th scope="col">Tổng tiền</th>
                                                {{-- <th scope="col"></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php 
                                                $total = 0;
                                            @endphp
                                            @forelse ($orderDetail as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'OR000' . $item->id }}</th>
                                                    <td class="d-flex" style="align-items: center;">
                                                        <img class="img-responsive"
                                                        src="{{ asset($item->product->image) ? '' . asset($item->product->image) : $item->product->name }}"
                                                        alt="Long Oversized" width="50" height="50" style="margin-right:10px !important;">
                                                        <div style="width:5px; height:30px;" class="bg-danger" ></div>
                                                                        @if ($item->product)
                                                            <span class="ml-4">{{ $item->product->name }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->quantity)
                                                            <span>{{ $item->quantity }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->price)
                                                            @if($item->discount)
                                                            <span  style="text-decoration-line:line-through; font-size:10px; margin-right:10px;">
                                                                {{ number_format($item->price + $item->discount) }} /vnđ
                                                            </span>
                                                            @endif
                                                            <span class=" text-danger">{{ number_format($item->price) }} /vnđ</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                
                                                    {{-- <td>
                                                        @if ($item->discount)
                                                            <span>{{ number_format($item->discount) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        @if ($item->total_payment)
                                                            <span>{{ number_format($item->total_payment) }} /vnđ</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>

                                                    @php 
                                                        $total = $total + $item->total_payment;
                                                    @endphp
                                                    {{-- <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Orders_Edit', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan="12" style="color: red !important">Không có bản ghi</td>
                                                </tr>
                                            @endforelse
                                            @if($orders->discount_product)
                                                <tr>
                                                    <td colspan="4">Voucher (Khuyến mãi)</td>
                                                    <td> - {{ number_format($orders->discount_product->total) }}
                                                            /vnđ</td>

                                                </tr>
                                            @endif
                                            <tr>
                                                <td colspan="4">Tiền ship</td>
                                                <td> + {{ number_format($price_check) }}
                                                        /vnđ</td>

                                            </tr>
                                            <tr>
                                                <td colspan="4">Tổng cộng</td>
                                                <td >
                                                    @if($orders->total)
                                                        {{ number_format($orders->total) }}
                                                    @else
                                                        {{number_format($total)}}
                                                    @endif
                                                          /vnđ</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mb-0 text-end mb-3 mr-3">
                                <div style="display: flex; justify-content: end; gap: 5px">
                                    <form  action="{{ route('route_BackEnd_Orders_Update', ['id' => request()->route('id')]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @php
                                            $displayedStatusOrder = null;
                                        @endphp
    
                                        @foreach ($orderDetail as $index => $item)
                                            @if ($displayedStatusOrder !== $item->order->id)
                                                @if ($item->order->status === 5)
                                                    <button type="submit" class="btn btn-success waves-effect"><i class="fa-solid fa-check" style="margin-right:5px;"></i>Đã nhận hàng</button>
                                                    <input type="text" name="status" 
                                                        value="1" 
                                                    hidden>
                                                @endif
                                                @php
                                                    $displayedStatusOrder = $item->order->id;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </form>
                                    <form action="{{ route('route_BackEnd_Orders_Update', ['id' => request()->route('id')]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @php
                                            $displayedStatusCancelOrder = null;
                                        @endphp
    
                                        @foreach ($orderDetail as $index => $item)
                                            @if ($displayedStatusCancelOrder !== $item->order->id)
                                                @if ($item->order->status === 0)
                                                    <button type="submit" class="btn btn-danger waves-effect"><i class="fa-solid fa-x" style="margin-right:5px;"></i>Huỷ</button>
                                                    <input type="text" name="status" value="2" hidden>
                                                @endif
                                                @php
                                                    $displayedStatusCancelOrder = $item->order->id;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </form>
                                  
    
                                    <a href="{{ route('user.userOrder',['id' => auth()->user()->id]) }}"
                                        class="btn btn-secondary waves-effect"><i class="fa-solid fa-arrow-left" style="margin-right:5px;"></i>Quay lại</a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        
     
    </script>
@endsection
