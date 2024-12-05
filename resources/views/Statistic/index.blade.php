@extends('layouts.admin.master')

@section('title', 'Doanh thu sản phẩm')

@section('content')
<style>
    
</style>
@php
use Illuminate\Support\Carbon;
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="main-content">
     
        <div class="page-content">
            <div class="container-fluid" >
                <form action="{{route('statistic.index')}}" class="row" method="get">
                    <div class="col-md-4" style="margin-top:30px !important;">
                        <label for="">Từ ngày</label>
                        <input type="date" name="start" class="form-control" value="{{Carbon::parse($data_start_)->format('Y-m-d')}}">
                    </div>
                    <div class="col-md-4" style="margin-top:30px !important;">
                        <label for="">Đến ngày ngày</label>

                        <input type="date" name="end" class="form-control" value="{{Carbon::parse($data_end)->format('Y-m-d')}}">
                    </div>
                    <div class="col-md-4" style="margin-top:30px !important;">
                        <button class="btn btn-primary" style="margin-top:28px;"><i class="fa-solid fa-filter" style="margin-right:5px;"></i>Tìm kiếm</button>
                    </div>
                    
                </form>
                
                    <div class="d-flex mt-3 mb-3" style="margin:0 auto; align-items:center; justify-content:center;">
                        <div class="mt-3 d-flex align-items-center justify-content-between "
                        style="width:350px; height:auto; border-radius:5px;
                        padding:20px 5px;
                        border:2px solid #ec4561;">
                          
                           <div class="d-flex justify-content-between align-items-center m-auto" style="width:90%;">
                               <i class="fa-solid fa-hand-holding-dollar" style="color:#ec4561; font-size:30px; 
                               padding:10px;
                               border:1px solid #ec4561; border-radius:50%;"></i>
                               <div>
                                   <h5 class="text-center text-white" style="color:#ec4561 !important; ">Số lượng nhập</h5>
                                   <p class=" text-center mb-0"> + {{ number_format($Inventory_quantity_import) }}</p>
                               </div>
                           </div>
                           
                       </div>
                        <div class="mt-3 d-flex align-items-center justify-content-between "
                         style="width:350px; height:auto; border-radius:5px;
                           padding:20px 5px;
                         border:2px solid #ec4561; margin-left: 50px;">
                           
                            <div class="d-flex justify-content-between align-items-center m-auto" style="width:90%;">
                                <i class="fa-solid fa-hand-holding-dollar" style="color:#ec4561; font-size:30px;  
                                padding:10px;
                                border:1px solid #ec4561; border-radius:50%;"></i>
                                <div>
                                    <h5 class="text-center text-white" style="color:#ec4561 !important; ">Tiền nhập kho</h5>
                                    <p class=" text-center mb-0"> - {{ number_format($Inventory) }} VNĐ</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="mt-3 d-flex align-items-center justify-content-between "
                        style="width:350px; height:auto; border-radius:5px; padding:20px 5px;
                         border:2px solid #02a499; margin-left:50px;">
                          
                           <div class="d-flex justify-content-between align-items-center m-auto" style="width:90%;">
                            <i class="fa-solid fa-hand-holding-dollar" style="color:#02a499; font-size:30px; 
                               padding:10px;
                               border:1px solid #02a499; border-radius:50%;"></i>
                               <div>
                                   <h5 class="text-center text-success" >Số lượng xuất</h5>
                                   <p class="text-center mb-0"> - {{ number_format($Inventory_quantity_export) }} </p>
                               </div>
                           </div>
                           
                       </div>
                       <div class="mt-3 d-flex align-items-center justify-content-between "
                       style="width:350px; height:auto; border-radius:5px;
                       padding:20px 5px;
                       border:2px solid #02a499; margin-left:50px;">
                         
                          <div class="d-flex justify-content-between align-items-center m-auto" style="width:90%;">
                           <i class="fa-solid fa-hand-holding-dollar" style="color:#02a499; font-size:30px;  
                              padding:10px;
                              border:1px solid #02a499; border-radius:50%;"></i>
                              <div>
                                  <h5 class="text-center text-success" >Tiền xuất kho</h5>
                                  <p class="text-center mb-0"> + {{ number_format($Inventory_ex) }} VNĐ</p>
                              </div>
                          </div>
                          
                      </div>
                    </div>
                    
                    
                 
              
               
                <div class="mt-3 ">
                    <div style=" height:100vh;">
                        <h5 class="text-center"> Thống kê theo biểu đồ</h5>
                        <canvas class="mb-5" id="myChart" ></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('myChart');
    

    var dateArray = @json($date);
    var countData = @json($total);
  

   
    new Chart(ctx, {
        type: 'line'
        , data: {
            labels: dateArray
            , datasets: [{
                label: 'Thống kê doanh thu theo ngày'
                , data: countData
                ,    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
        borderWidth: 1
                    }]
                }
                , options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
    </script>

@endsection
