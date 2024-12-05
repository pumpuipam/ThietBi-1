@extends('layouts.client.master')

@section('title', 'Danh mục hàng hóa')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <div class="main-container shop-page left-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="container bg-white pb-5 pt-5 shadow" style="border-radius:5px;">
                  
                    <h2 class="p-3 d-flex" style="background-color:#FCDDEF; align-items:center; border-radius:10px;">
                        <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-11-2023/icon_new.png" alt="" 
                        style="width:30px; height:30px;">
                        <p class="ml-2 mb-0" style="font-size:18px;"> Hóa đơn của tôi</p>
                    </h2>
                    <table class="table table-striped " id="table">
                        <thead>
                          <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Email sử dụng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col" class="text-center">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php 
                              use Illuminate\Support\Carbon;

                            @endphp
                            {{-- {{dd($orders)}} --}}
                            @foreach($orders as $key => $value)
                             
                              <tr>
                                <th scope="row">{{'OR000'.$value->id}}</th>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                
                                <td>
                                  @if($value->payment_type == 1)
                                      Trả tiền mặt
                                  @else
                                      VNPay
                                  @endif
                                </td>
                                <td class="text-right">
                                    @if($value->total)
                                        {{ number_format($value->total) }}
                                    @else
                                    
                                        @php 
                                        $total = 0;
                                        @endphp
                                        @foreach($value->orderDetail as $Detail)
                                            @php
                                            
                                            $total = $Detail->total_payment +  $total;
                                            @endphp
                                        @endforeach
                                        {{number_format($total)}} /vnđ
                                    @endif
                                </td>
                                <td>
                                    {{Carbon::parse($value->created_at)->format('H:i:s')}} |
                                    {{Carbon::parse($value->created_at)->format('d-m-Y')}}

                                </td>
                                <td class="text-center">
                                    @if ($value && $value->status === 0)
                                        <span class="badge bg-warning text-white">Đang chờ</span>
                                    @elseif($value && $value->status === 2)
                                        <span class="badge bg-danger text-white">Huỷ</span>
                                    @elseif($value && $value->status === 3)
                                        <span class="badge bg-info text-white">Đã xác nhận</span>
                                    @elseif($value && $value->status === 4)
                                        <span class="badge bg-info text-white">Đã nhận hàng</span>
                                    @elseif($value && $value->status === 5)
                                        <span class="badge bg-info text-white">Đơn hàng đang giao</span>
                                    @else 
                                          <span class="badge bg-success text-white">Đã nhận hàng</span>
                                    @endif
                                </td>
                                <td>
                                  <div class="text-center">
                                    
                                      {{-- <a href="{{ route('route_BackEnd_Orders_Edit', $value->id) }}"
                                          class="btn btn-primary "><i class="fa-solid fa-eye"></i></a> --}}
                                          <a href="{{ route('user.route_BackEnd_Orders_Edit', $value->id) }}"
                                            class="btn btn-primary "><i class="fa-solid fa-eye"></i></a>
                                  </div>
                              </td>    
                              </tr>
                            @endforeach
                        
                         
                        </tbody>
                        
                    </table>
                      
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
   
@endsection
