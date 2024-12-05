@extends('layouts.admin.master')

@section('title', 'Danh sách đơn hàng')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
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
                                <h4 class="card-title mb-4">Danh sách đơn hàng</h4>
                                @php
                                                
                                    use Illuminate\Support\Carbon;
                                @endphp
                              
                                    <div class="row">
                                                    
                                       
                                        <form action="{{route('route_BackEnd_Orders_List')}}" class="row" method="get">
                                            <div class="col-md-3" style="margin-top:30px !important;">
                                                <label for="">Tìm mã hóa đơn</label>
                                                <input type="text" name="bill" class="form-control" value="{{ $bill }}" placeholder="Tìm mã hóa đơn"> 
                                            </div>
                                            <div class="col-md-3" style="margin-top:30px !important;">
                                                <label for="">Từ ngày</label>
                                                <input type="date" name="start" class="form-control" value="{{Carbon::parse($data_start)->format('Y-m-d')}}">
                                            </div>
                                            <div class="col-md-3" style="margin-top:30px !important;">
                                                <label for="">Đến ngày</label>

                                                <input type="date" name="end" class="form-control" value="{{Carbon::parse($data_end)->format('Y-m-d')}}">
                                            </div>
                                            @if($status)
                                                    <input type="hidden" value="{{$status}}" name="status">
                                            @endif
                                            <div class="col-md-3" style="margin-top:30px !important;">
                                                <button class="btn btn-primary" style="margin-top:28px;"><i class="fa-solid fa-filter" style="margin-right:5px;"></i>Tìm kiếm</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                @if(!$status)
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6 " style="border-radius:20px;">
                                            <div class="card mini-stat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4 ">
                                                            <img class="mt-3" src="assets/images/services-icon/01.png" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:13px !important;">Đơn thành công</h5>
                                                        <h4 class="fw-medium font-size-24 d-flex"><div  id="countsucess">{{ $countOrderSuccessToday }}</div> <i
                                                                class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                                        <div class="mini-stat-label bg-success">
                                                            {{-- <p class="mb-0">+ 12%</p> --}}
                                                        </div>
                                                    </div>
                                                    {{-- <div class="pt-2">
                                                        <div class="float-end">
                                                            <a href="{{route('route_BackEnd_Orders_List',['status' => '1'])}}" class="text-white-50"><i
                                                                    class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                                        </div>
                    
                                                        <p class="text-white-50 mb-0 mt-1">
                    
                                                            <input type="date" id="date_success" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                            <button style="border-radius:5px; border:none; height:27px;" onclick="searchDate(1)"><i class="fa-solid fa-filter"></i></button>
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                                            <div class="card mini-stat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img class="mt-3" src="assets/images/services-icon/04.png" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50"
                                                        style="font-size:13px !important;">Đơn hàng chờ</h5>
                                                        <h4 class="fw-medium font-size-24 d-flex"><div  id="countpending">{{ $countOrderPendingToday }} </div><i
                                                                class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                                        <div class="mini-stat-label bg-warning">
                                                            {{-- <p class="mb-0">+ 84%</p> --}}
                                                        </div>
                                                    </div>
                                                    {{-- <div class="pt-2">
                                                        <div class="float-end">
                                                            <a href="{{route('route_BackEnd_Orders_List',['status' => '0'])}}" class="text-white-50"><i
                                                                    class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                                        </div>
                    
                                                        <p class="text-white-50 mb-0 mt-1">
                                                            <input type="date" id="date_pending" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                            <button style="border-radius:5px; border:none; height:27px;" onclick="searchDate(0)"><i class="fa-solid fa-filter"></i></button>
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                                            <div class="card mini-stat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img class="mt-3" src="assets/images/services-icon/02.png" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50"   style="font-size:13px !important;">Đơn hàng xác nhận</h5>
                                                        <h4 class="fw-medium font-size-24 d-flex"> <div id="countCancel">{{ $countOrderCancelToday }}</div> 
                                                            <i
                                                            class="mdi mdi-arrow-up text-success ms-2"></i>
                                                            </h4>
                                                        <div class="mini-stat-label bg-danger">
                                                            {{-- <p class="mb-0">- 28%</p> --}}
                                                        </div>
                                                    </div>
                                                    {{-- <div class="pt-2">
                                                        <div class="float-end">
                                                            <a href="{{route('route_BackEnd_Orders_List',['status' => '2'])}}" class="text-white-50"><i
                                                                    class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                                        </div>
                    
                                                        <p class="text-white-50 mb-0 mt-1">
                    
                                                            <input type="date" id="date_cancel" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                            <button style="border-radius:5px; border:none; height:27px;" onclick="searchDate(2)"><i class="fa-solid fa-filter"></i></button>
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                                            <div class="card mini-stat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img class="mt-3" src="assets/images/services-icon/03.png" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:13px !important;">Hóa đơn đang giao</h5>
                                                        <h4 class="fw-medium font-size-24 d-flex"><div id="countAccept">{{ $countOrderAcceptToday }}</div> <i
                                                                class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                                        <div class="mini-stat-label bg-info">
                                                           
                                                        </div>
                                                    </div>
                                                    {{-- <div class="pt-2">
                                                        <div class="float-end">
                                                            <a href="{{route('route_BackEnd_Orders_List',['status' => '3'])}}" class="text-white-50"><i
                                                                    class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                                        </div>
                    
                                                        <p class="text-white-50 mb-0 mt-1">
                    
                                                            <input type="date" id="date_accept" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                            <button style="border-radius:5px; border:none; height:27px;" onclick="searchDate(3)"><i class="fa-solid fa-filter"></i></button>
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Địa chỉ</th>

                                                <th scope="col">Phương thức thanh toán</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order as $item)
                                              
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'OR000' . $item->id }}</th>
                                                    <td>
                                                        @if ($item->email)
                                                            <span>{{ $item->email }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->phone)
                                                            <span>{{ $item->phone }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->address)
                                                            <span>{{ $item->address }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                       
                                                            <span>
                                                                @if($item->user_id == 2)
                                                                        Tại cửa hàng
                                                                @else
                                                                    @if($item->payment_type == 1)
                                                                        COD
                                                                    @else
                                                                        VNPay
                                                                    @endif
                                                                @endif
                                                            </span>
                                                      
                                                         
                                                    </td>
                                                    <td>
                                                        @if($item->total)
                                                            {{ number_format($item->total) }}
                                                        @else
                                                        
                                                            @php 
                                                            $total = 0;
                                                            @endphp
                                                            @foreach($item->orderDetail as $Detail)
                                                                @php
                                                                
                                                                $total = $Detail->total_payment +  $total;
                                                                @endphp
                                                            @endforeach
                                                            {{number_format($total)}} /vnđ
                                                        @endif
                                                   
                                                    </td>

                                                    <td>
                                                        @if ($item->created_at)
                                                            <span>
                                                                {{Carbon::parse($item->created_at)->format('H:i:s')}} |
                                                                {{Carbon::parse($item->created_at)->format('d-m-Y')}}
                                                            </span>
                                                        @else
                                                            <span>Không có ngày sinh</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item && $item->status === 0)
                                                            <span class="badge bg-warning">Đang chờ</span>
                                                        @elseif ($item && $item->status === 1)
                                                            @if($item->user_id)
                                                                <span class="badge bg-success">Đã thanh toán</span>
                                                            @else
                                                                <span class="badge bg-success">Đã nhận hàng</span>
                                                            @endif
                                                        @elseif ($item && $item->status === 2)
                                                            <span class="badge bg-danger">Huỷ</span>
                                                        @elseif ($item && $item->status === 3)
                                                            <span class="badge bg-info">Đã xác nhận</span>
                                                        @elseif ($item && $item->status === 4)
                                                            <span class="badge bg-dark">Đã nhận hàng</span>
                                                        @elseif ($item && $item->status === 5)
                                                            <span class="badge bg-dark">Đơn hàng đang giao</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Orders_PDF', $item->id) }}"
                                                                class="btn btn-success "><i class="fa-solid fa-file-csv"></i></a>
                                                            <a href="{{ route('route_BackEnd_Orders_Edit', $item->id) }}"
                                                                class="btn btn-primary "><i class="fa-solid fa-eye"></i></a>
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
                                    {{ $order->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchDate(id){
            if(id == 1){
                var date_success = $('#date_success').val(); 
            }else if(id == 0){
                var date_success = $('#date_pending').val(); 
            }else if(id == 2){
                var date_success = $('#date_cancel').val(); 
            } else{
                var date_success = $('#date_accept').val(); 

            }
      
            $.ajax({
                    url: "{{route('route_BackEnd_Dashboard_Search')}}",
                    method: 'get',
                    data:{
                        id:id,
                        date_success:date_success
                    },
                    success: function(data){
                        if(id == 1){
                            $('#countsucess').html(data);
                        }else if(id == 0){
                            $('#countpending').html(data);
                        } else if(id == 2){
                            $('#countCancel').html(data);
                        } else{
                            $('#countAccept').html(data);
                        
                        }
                    }
                })
        }
                     
        
    </script>
@endsection
