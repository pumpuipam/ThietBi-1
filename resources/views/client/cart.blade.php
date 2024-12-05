@extends('layouts.client.master')

@section('title', 'Giỏ hàng')

@section('content')

    <main class="site-main main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha  " >
                            <div >
                                <h2 class="p-3 d-flex" style="background-color:#FCDDEF; align-items:center; border-radius:10px;">
                                    <img src="https://cdn0.fahasa.com/media/wysiwyg/Duy-VHDT/Icon_Balo_120x120.png" alt="" style="width:30px; height:30px;">
                                    <p class="ml-2 mb-0" style="font-size:18px;"> Sản phẩm yêu thích</p>
                                </h2>
                                <div class="akasha-notices-wrapper"></div>
                                <form class="akasha-cart-form shadow">
                                    <table class="shop_table shop_table_responsive cart akasha-cart-form__contents bg-white"
                                        cellspacing="0">
                                        <thead style="border-bottom: 1px solid #C92127;">
                                            <tr class="bg-white">
                                                <th><a onclick="return confirm('Bạn có chắc muốn xóa hết đơn hàng không?')"
                                                        href="{{ route('cartDeleteAll') }}"><i class="fa-solid fa-trash-can-arrow-up"></i></a></th>
                                                {{-- <th class="product-remove">&nbsp;</th> --}}
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="text-left product-price">Giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng giá</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            @php
                                                $cart = session('cart');
                                             
                                                $tong = 0;
                                            @endphp
    
                                            @if ($cart)
                                                @for ($i = 0; $i < count($cart); $i++)
                                                  
                                                    @php
                                                        $item = $cart[$i];
                                                    
                                                        $tong += $item[7];
                                                    @endphp
                                                    <tr class="akasha-cart-form__cart-item cart_item">
                                                        <td class="product-remove">
                                                            <a class="remove"
                                                                onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                                                href="{{ route('cartDelete', $i) }}"><i class="fa-solid fa-trash-can"></i></a>
                                                        </td>
                                                        <td class="product-thumbnail">
                                                            <img class="attachment-akasha_thumbnail size-akasha_thumbnail"
                                                                src="{{ asset($item[1]) }}"
                                                                alt="" width="600" height="778" style="border-radius:5px;">
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            {{ $item[2] }}
                                                            <br>
                                                            <span  style="font-weight:500; font-size:12px; color:#C92127 !important;">Số lượng còn lại: 
                                                                <span id="quantity_product_{{$i}}">
                                                                    {{$item[8]}}
                                                                </span>
                                                            </span>
                                                        </td>
                                                        <td class="product-price d-flex mt-4" data-title="Price">
                                                            <span class="akasha-Price-amount amount " id="amout_{{$i}}" 
                                                            style="color:#C92127 !important; font-weight:500;"><span
                                                                    class="akasha-Price-currencySymbol"></span>
                                                                    {{ number_format($item[6]) }} 
                                                                
                                                                </span>
    
                                                            <span style="color:#C92127 !important; font-weight:500;">/vnđ</span>
                                                            
                                                            @if((int)$item[6] != (int)$item[3])
                                                            <p class="mb-0 ml-3" style="font-size:12px; text-decoration-line:line-through; "> {{ number_format($item[3]) }} </p>
                                                        @endif
                                                        </td>
                                                        <td class="product-quantity" data-title="Quantity">
                                                            <div class="quantity">
                                                                <div class="control">
                                                                    <a class="btn-number qtyminus quantity-minus"
                                                                        href="#" onclick="CheckMinus({{$i}})">-</a>
                                                                    <input type="text" id="input_{{$i}}"  value="{{ $item[4] }}"
                                                                        title="Qty" onkeyup="OnKey({{ $i }})" class="input-qty input-text qty text">
                                                                    <a class="btn-number qtyplus quantity-plus"
                                                                        href="#" onclick="CheckPlus({{$i}})">+</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product-subtotal" data-title="Total">
                                                            <span class="akasha-Price-amount amount" id="tottal_{{$i}}"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($item[7]) }}</span>
                                                            <span>/vnđ</span>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endif
    
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                           
                            <div class="cart-collaterals" >
                                <div class="cart_totals ">
                                    <h2>Tổng giỏ hàng</h2>
                                    <table class="shop_table shop_table_responsive" cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Tạm tính</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Subtotal"><span class="akasha-Price-amount amount" id="total_tamp"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>

                                                                <span>/vnđ</span>
                                                    </td>
                                                @else
                                                    <td data-title="Subtotal"><span class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>0</span>
                                                                <span>/vnđ</span>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Phí ship</th>
                                                <td data-title="Subtotal"><span class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol"></span>(Tính sau)</span>
                                                            <span></span>
                                                </td>
                                            </tr>
                                            
                                            <tr class="cart-subtotal">
                                                <th>Khuyến mãi</th>
                                                <td data-title="Subtotal">
                                                    @php
                                                        $cart = session('cart');
                                                    @endphp
                                                    <a class="btn btn-primary mr-2 text-white" onClick="showPromoAlert()">Áp dụng khuyến mãi</a>
                                                    
                                                        <a class="text-danger mr-1 @if(!$vouchers) d-none @endif" onClick="removePromoAlert()"  id="removePromoAlert"
                                                        style="cursor: pointer;">

                                                        <i class="fa-solid fa-x" style="font-weight:bold; font-size:18px;"></i></a>
                                                    
                                                     <span class="akasha-Price-amount amount" id="promotion">
                                                        <span class="akasha-Price-currencySymbol"></span>
                                                        @if (isset($cart) && is_array($cart))
                                                            @if($vouchers)
                                                                {{ number_format($vouchers['total']) }}
                                                            @else
                                                                0
                                                            @endif
                                                        @else
                                                                0
                                                        @endif
                                                    </span>
                                                            <span>/vnđ</span>
                                                   
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    

                                                    <td data-title="Total"><strong><span
                                                                class="akasha-Price-amount amount" id="total_end"><span
                                                                    class="akasha-Price-currencySymbol"></span>
                                                                    @if($vouchers)
                                                                      
                                                                        {{ number_format($tong - (int)$vouchers['total'])}}
                                                                    @else
                                                                        {{ number_format($tong ) }}
                                                                    @endif
                                                                    </span></strong>
                                                                    <span>/vnđ</span>
                                                    </td>
                                                @else
                                                    <td data-title="Total"><strong><span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>0</span></strong>
                                                                    <span>/vnđ</span>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                
                                    <div class="akasha-proceed-to-checkout mt-3" >
                                        <a href="{{ route('route_FrontEnd_Checkout') }}"
                                            class="checkout-button button alt shadow akasha-forward" style="border-radius:20px;">
                                            Tiến hành thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade " id="staticBackdrop"
    data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm " style="width:500px;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-primary" 
              id="staticBackdropLabel" style="font-size:12px; font-weight:bold;">
              <img src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images/promotion/ico_coupon.svg?q=105954" alt="">
              Áp dụng mã khuyến mãi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @foreach ($Promotion as $pro)
                    <div class="d-flex w-100" style="align-items:center; justify-content:space-between;">
                        <div class="">
                            <img src="https://cdn-icons-png.flaticon.com/512/1405/1405276.png" alt="" style="width:100px; height:90px;">
                        </div>
                        <div class="ml-3">
                            <h5 class="mb-0" style="font-size: 13px; font-weight:bold; color:#C92127 !important;">{{ $pro->name }}</h5>
                            <span style="font-weight:bold; font-size:12px;">Mã: {{ $pro->code }}</span>
                            <br>
                            <span style="font-weight:bold; font-size:12px;"> Mệnh giá:
                                
                                {{ number_format($pro->total) }} 
                                
                                @if($pro->form == 1)
                                        đ
                                @else
                                        %
                                @endif
                            </span>
                            <br>
                            <span style="font-weight:bold; font-size:12px;"> Số lượng:
                                
                                {{ number_format($pro->quantity) }} 
                                
                               
                                </span>
                        </div>
                        <div class="">
                            <button onClick="AddVoucher({{ $pro->id }},{{ $pro->total }})">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                @endforeach
                
               
              
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" style="background-color:#C92127 !important; border-color:#C92127;">Áp dụng</button>
            </div> --}}
          </div>
        </div>
      </div>

    <script>
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function CheckMinus(id){
            var input = $('#input_'+id).val();
            if(parseInt(input) > 1){
                $('#input_'+id).val(parseInt(input)-1);
                ChangePrice(id,parseInt(input-1))
                $.ajax({
                    url: "{{ route('updateQuantity') }}",
                    method: "GET",
                    data: {
                        id: id,
                        value: parseInt(input)-1,
                    },
                    success: function(data) {
                        // sum = 
                        var promotion = $('#promotion').text().replaceAll(',', '');
                        sum = parseInt(data.total) - parseInt(promotion)
                        $('#total_end').text(formatNumber(sum));
                        $('#total_tamp').text(formatNumber(data.total));
                    
                    }
                })
                
            }
            
           
        }

        function OnKey(id) {
            var input = $('#input_' + id).val();
            var quantity_product = $('#quantity_product_' + id).text();
            console.log(input);
            if (input > 0) {
                if (parseInt(input) > parseInt(quantity_product)) {
                    alert('Số lượng không đủ');
                    $('.checkout-button').prop('disabled', true);
                    $('#input_' + id).val(parseInt(quantity_product));
                }
            } else {
                alert('Số lượng phải lớn hơn 0');
                $('#input_' + id).val(1);
            }
        }
        
        function CheckPlus(id){
            var input = $('#input_'+id).val();
            var Input_number= parseInt(input)+1;
            var quantity_product = $('#quantity_product_'+id).text();
            var quantity_new = 0;
            if(Input_number > parseInt(quantity_product)){
                alert('Số lượng tối đa là: '+quantity_product);
                $('#input_'+id).val(parseInt(quantity_product));
                quantity_new = parseInt(quantity_product);
            }else{
                quantity_new = Input_number;
                $('#input_'+id).val(Input_number);
            }
      

            ChangePrice(id,parseInt(input)+1);
            $.ajax({
                url: "{{ route('updateQuantity') }}",
                method: "GET",
                data: {
                    id: id,
                    value: quantity_new,
                },
                success: function(data) {
                    // alert(1);
                    var promotion = $('#promotion').text().replaceAll(',', '');
                
                    sum = parseInt(data.total) - parseInt(promotion);

                    $('#total_end').text(formatNumber(sum));
                    $('#total_tamp').text(formatNumber(data.total));

                   
                }
            })
           
        }
      
        function ChangePrice(id,value){
      
            var amount = $('#amout_'+id).text().replaceAll(',', '');
            var text = amount*value;
            
            $('#tottal_'+id).text(formatNumber(text));

        }

       
            function showPromoAlert() {
            

                    $('#staticBackdrop').modal('show');
            }


            function removePromoAlert(){
                    Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Đã Hủy khuyến mãi",
                    showConfirmButton: false,
                    timer: 1000
                    });
                   
                    $.ajax({
                    url: "{{ route('route_FrontEnd_Remove_Voucher') }}",
                    method: "GET",
                    success: function(data) {
                        
                        var  promotion = $('#promotion').text().replaceAll(',', '');
                        var total_end = $('#total_end').text().replaceAll(',', '');
                        var sum = parseInt(total_end) + parseInt(promotion);
                        $('#total_end').text(formatNumber(sum));
                        var  promotion = $('#promotion').text(0);
                        $('#removePromoAlert').addClass('d-none');
                       

                    
                    }
                })
            }

            function AddVoucher(id,total){
                $.ajax({
                    url: "{{ route('route_FrontEnd_Add_Voucher') }}",
                    method: "GET",
                    data: {
                        id: id,
                        total: total,

                    },
                    success: function(data) {
                        
                        $('#staticBackdrop').modal('hide');
                        $('#promotion').text(formatNumber(total));

                         var total_end = $('#total_tamp').text().replaceAll(',', '');
                         var sum = parseInt(total_end) - parseInt(total);
                         $('#total_end').text(formatNumber(sum));
                         $('#removePromoAlert').removeClass('d-none');
                       

                    
                    }
                })
            }
        
    </script>
@endsection
