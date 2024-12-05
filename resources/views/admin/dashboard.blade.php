@extends('layouts.admin.master')

@section('title', 'Trang chủ')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="main-content" style="background: #f2f7ff;">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Trang chủ</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Chào mừng bạn đến với trang chủ</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-cog me-2"></i> Export
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('route_BackEnd_Dashboard_Export') }}">Khách
                                            hàng</a>
                                        <a class="dropdown-item"
                                            href="{{ route('route_BackEnd_Dashboard_Export_Order') }}">Đơn hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
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

                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6 " style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/01.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:14px !important;">Đơn thành công</h5>
                                    <h4 class="fw-medium font-size-24 d-flex"><div  id="countsucess">{{ $countOrderSuccessToday }}</div> <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-success">
                                        {{-- <p class="mb-0">+ 12%</p> --}}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Orders_List',['status' => '1'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>
                                    <p class="text-white-50 mb-0 mt-1">Hôm nay</p>

                                    {{-- <form action="{{route('route_BackEnd_Orders_List')}}" method="get">
                                        <p class="text-white-50 mb-0 mt-1">
                                            <div>
                                                <div>
                                                    <label for="">Từ ngày</label>
                                                    <input class="form-control" type="date" name="start" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                                <div>
                                                    <label class="mt-2" for="">Đến ngày</label>
                                                    <input class="form-control" type="date" name="end"  value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="mt-4 w-100" style="border-radius:5px; border:none;">Tìm kiếm</button>
                                        </p>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/04.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:14px !important;">Đơn hàng chờ</h5>
                                    <h4 class="fw-medium font-size-24 d-flex"><div  id="countpending">{{ $countOrderPendingToday }} </div><i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-warning">
                                        {{-- <p class="mb-0">+ 84%</p> --}}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Orders_List',['status' => '10'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>
                                    <p class="text-white-50 mb-0 mt-1">Hôm nay</p>

                                    {{-- <p class="text-white-50 mb-0 mt-1">
                                        <input type="date" id="date_pending" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
                                        <button style="border-radius:5px; border:none;" onclick="searchDate(0)"><i class="fa-solid fa-filter"></i></button>
                                    </p> --}}
                                    {{-- <p class="text-white-50 mb-0 mt-1">Xem thêm</p> --}}
                                    {{-- <form action="{{route('route_BackEnd_Orders_List')}}" method="get">
                                        <p class="text-white-50 mb-0 mt-1">
                                            <div>
                                                <div>
                                                    <label for="">Từ ngày</label>
                                                    <input class="form-control" type="date" name="start" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                                <div>
                                                    <label class="mt-2" for="">Đến ngày</label>
                                                    <input class="form-control" type="date" name="end"  value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="status" value="10">
                                            <button type="submit" class="mt-4 w-100" style="border-radius:5px; border:none;">Tìm kiếm</button>
                                        </p>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/02.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:14px !important;">Đơn hàng xác nhận</h5>
                                    <h4 class="fw-medium font-size-24 d-flex"> <div id="countCancel">{{ $countOrderCancelToday }}</div> 
                                        
                                            <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i>
                                        </h4>
                                    <div class="mini-stat-label bg-danger">
                                        
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Orders_List',['status' => '3'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    {{-- <p class="text-white-50 mb-0 mt-1">

                                        <input type="date" id="date_cancel" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
                                        <button style="border-radius:5px; border:none;" onclick="searchDate(2)"><i class="fa-solid fa-filter"></i></button>
                                    </p> --}}
                                    <p class="text-white-50 mb-0 mt-1">Hôm nay</p>
                                    {{-- <form action="{{route('route_BackEnd_Orders_List')}}" method="get">
                                        <p class="text-white-50 mb-0 mt-1">
                                            <div>
                                                <div>
                                                    <label for="">Từ ngày</label>
                                                    <input class="form-control" type="date" name="start" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                                <div>
                                                    <label class="mt-2" for="">Đến ngày</label>
                                                    <input class="form-control" type="date" name="end"  value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="mt-4 w-100" style="border-radius:5px; border:none;">Tìm kiếm</button>
                                        </p>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/03.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:14px !important;">Hóa đơn đang giao</h5>
                                    <h4 class="fw-medium font-size-24 d-flex"><div id="countAccept">{{ $countOrderAcceptToday }}</div> <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-info">
                                       
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Orders_List',['status' => '5'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    {{-- <p class="text-white-50 mb-0 mt-1">

                                        <input type="date" id="date_accept" value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
                                        <button style="border-radius:5px; border:none;" onclick="searchDate(3)"><i class="fa-solid fa-filter"></i></button>
                                    </p> --}}
                                    {{-- <p class="text-white-50 mb-0 mt-1">Xem thêm</p> --}}
                                    <p class="text-white-50 mb-0 mt-1">Hôm nay</p>
                                    {{-- <form action="{{route('route_BackEnd_Orders_List')}}" method="get">
                                        <p class="text-white-50 mb-0 mt-1">
                                            <div>
                                                <div>
                                                    <label for="">Từ ngày</label>
                                                    <input class="form-control" type="date" name="start" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                                <div>
                                                    <label class="mt-2" for="">Đến ngày</label>
                                                    <input class="form-control" type="date" name="end"  value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="status" value="3">
                                            <button type="submit" class="mt-4 w-100" style="border-radius:5px; border:none;">Tìm kiếm</button>
                                        </p>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- sản phẩm --}}
                <div class="row">
                    <div class="col-xl-3 col-md-6 " style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="https://tudienthicong.com/wp-content/uploads/2021/09/San-pham-icon-1.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:13px !important;">Sản phẩm sắp hết hàng</h5>
                                    <h4 class="fw-medium font-size-24">{{ $product_quantity }} <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-success">
                                        {{-- <p class="mb-0">+ 12%</p> --}}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Products_List',['out_of_stock' => '10'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Xem thêm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="https://pnghq.com/wp-content/uploads/product-icon-png-hd-transparent-png-47897.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:13px !important;">Sản phẩm đang hoạt động</h5>
                                    <h4 class="fw-medium font-size-24">{{ $product_active }} <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-warning">
                                        {{-- <p class="mb-0">+ 84%</p> --}}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Products_List',['active' => '1'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Hôm nay</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/product-5806313-4863042.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:13px !important;">Sản phẩm ngưng hoạt động</h5>
                                    <h4 class="fw-medium font-size-24">{{ $product_Inactive }} <i
                                            class="mdi mdi-arrow-down text-danger ms-2"></i></h4>
                                    <div class="mini-stat-label bg-danger">
                                        {{-- <p class="mb-0">- 28%</p> --}}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('route_BackEnd_Products_List',['active' => '2'])}}" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Hôm nay</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" style="border-radius:20px;">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="https://cdn-icons-png.flaticon.com/512/962/962669.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50" style="font-size:13px !important;">Top sản phẩm bán chạy</h5>
                                    <h4 class="fw-medium font-size-24">{{ count($result) }} <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-info">
                                        {{-- <p class="mb-0"> 00%</p> --}}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    {{-- <div class="float-end">
                                        <a href="#" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div> --}}

                                    <p class="text-white-50 mb-0 mt-1">Thống kê bên dưới</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                
                </div>
                <!-- end row -->

           

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Top sản phẩm bán chạy</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">(#) Id</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Giá bán</th>
                                                {{-- <th scope="col" colspan="2">Status</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $re)
                                         
                                                <tr>
                                                
                                                        <th scope="row">{{'PR000'.$re['product_id']->id}}</th>
                                                        <td>
                                                            <div>
                                                                <img src="{{ asset($re['product_id']->image) ? '' . asset($re['product_id']->image) : $re['product_id']->name }}" alt=""
                                                                    class="avatar-xs rounded-circle me-2"> {{$re['product_id']->name}}
                                                            </div>
                                                        </td>
                                                        <td>{{$re['quantity']}}</td>
                                                        <td>{{number_format($re['product_id']->price)}}/vnđ</td>
                                                
                                                </tr>
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

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
