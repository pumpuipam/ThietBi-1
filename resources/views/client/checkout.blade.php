@extends('layouts.client.master')

@section('title', 'Thanh toán')

@section('content')

    <main class="site-main main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <form name="checkout" method="post" class="checkout akasha-checkout"
                                action="{{ route('route_FrontEnd_Create_Checkout') }}" enctype="multipart/form-data"
                                novalidate="novalidate">
                                @csrf
                                <div class="col2-set" id="customer_details">
                                    <div class="col-1 bg-white shadow" style="border-radius:10px;">
                                        <div class="akasha-billing-fields">
                                            <h3>Thông tin đơn hàng</h3>
                                            @if (Session::get('user_profile'))
                                                @foreach (Session::get('user_profile') as $user)
                                                 
                                                    <div class="akasha-billing-fields__field-wrapper">
                                                        <p class="form-row form-row-wide validate-required"
                                                            id="billing_first_name_field" data-priority="10"><label
                                                                for="billing_first_name" class="">Họ&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="text"
                                                                    class="input-text " name="firstName"
                                                                    id="billing_first_name" placeholder=""
                                                                    value="{{ $user['firstName'] }}" required>
                                                                @error('firstName')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required"
                                                            id="billing_last_name_field" data-priority="20"><label
                                                                for="billing_last_name" class="">Tên&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="text"
                                                                    class="input-text " name="lastname"
                                                                    id="billing_last_name" placeholder=""
                                                                    value="{{ $user['lastname'] }}" required>
                                                                @error('lastname')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-email"
                                                            id="billing_email_field" data-priority="110"><label
                                                                for="billing_email" class="">Email
                                                                &nbsp;<abbr class="required"
                                                                    title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="email"
                                                                    class="input-text " name="email" id="billing_email"
                                                                    placeholder="" value="{{ $user['email'] }}"
                                                                    required></span>
                                                            @error('email')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-phone"
                                                            id="billing_phone_field" data-priority="100"><label
                                                                for="billing_phone" class="">Số điện thoại&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="number"
                                                                    class="input-text " name="phone" id="billing_phone"
                                                                    placeholder="" value="{{ $user['phone'] }}"
                                                                    required></span>
                                                            @error('phone')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                        </p>
                                                        <p class="form-row form-row-wide adchair-field validate-required"
                                                            id="billing_adchair_1_field" data-priority="50"><label
                                                                for="billing_adchair_1" class="">Địa chỉ&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="text"
                                                                    class="input-text " name="address"
                                                                    id="billing_adchair_1" placeholder="Địa chỉ"
                                                                    value="{{ $user['address'] }}" required></span>
                                                            @error('address')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                        </p>
                                                      
                                                        <p class="form-row notes" id="order_comments_field"
                                                            data-priority="">
                                                            <label for="order_comments" class="">Ghi
                                                                chú&nbsp;</label><span class="akasha-input-wrapper">
                                                                <textarea name="note" class="input-text " 
                                                                id="order_comments" placeholder="" 
                                                                rows="1" cols="2" style="border-color: #adadad !important;"></textarea>
                                                            </span>
                                                        </p>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (!isset($user))
                                                    {{-- {{dd($User)}} --}}
                                                <div class="akasha-billing-fields__field-wrapper">
                                                    <p class="form-row validate-required"
                                                        id="billing_first_name_field" data-priority="10"><label
                                                            for="billing_first_name" class="">Họ và tên&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper">
                                                            <input type="text"
                                                                class="input-text " name="firstName"
                                                                id="billing_first_name" placeholder="" value="{{$User->username}}" required></span>
                                                        @error('firstName')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                   
                                                    <p class="form-row form-row-wide validate-required validate-email"
                                                        id="billing_email_field" data-priority="110"><label
                                                            for="billing_email" class="">Email
                                                            &nbsp;<abbr class="required"
                                                                title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="email"
                                                                class="input-text " name="email" id="billing_email"
                                                                placeholder="" value="{{$User->email}}" required></span>
                                                        @error('email')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </p>
                                                    <p class="form-row form-row-wide validate-required validate-phone"
                                                        id="billing_phone_field" data-priority="100"><label
                                                            for="billing_phone" class="">Số điện thoại&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="number"
                                                                class="input-text " name="phone" value="{{$User->phone}}" id="billing_phone"
                                                                placeholder="" required></span>
                                                        @error('phone')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <div class="form-row form-row-wide validate-required">
                                                        <label class="form-label">Chọn tỉnh </label>
                                                        <select  class="form-select w-100" name="provinceid" id="provinceid" onchange="ChooseProvinces()">
                                                            <option selected value=""> - - - Chọn tỉnh - - - </option>
                                                            @foreach($provinces as $province)
                                                                <option value="{{ $province->provinceid }}">{{ $province->type }} - {{ $province->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('type_id')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div  class="form-row form-row-wide validate-required">
                                                        <label class="form-label">Chọn huyện/thị trấn</label>
                                                        <select  class="form-select w-100" name="cityid" id="cityid" onchange="ChooseWardid()">
                                                            <option selected value=""> - - - Chọn huyện - - - </option>
                                                          
                                                        </select>
                                                        @error('type_id')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div  class="form-row form-row-wide validate-required">
                                                        <label class="form-label">Chọn xã/phường </label>
                                                        <select class="form-select w-100" name="wardid" id="wardid" onchange="Ward()">
                                                            <option selected value=""> - - - Chọn xã phường - - - </option>
                                                          
                                                        </select>
                                                        @error('type_id')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <p class="form-row form-row-wide adchair-field validate-required"
                                                        id="billing_adchair_1_field" data-priority="50"><label
                                                            for="billing_adchair_1" class="">Địa chỉ&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="text"
                                                                class="input-text " name="address" id="billing_adchair_1"
                                                                placeholder="Địa chỉ" value="{{$User->apartment_number}}, {{$User->address}}" required></span>
                                                        @error('address')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row notes" id="order_comments_field" data-priority="">
                                                        <label for="order_comments" class="">Ghi
                                                            chú&nbsp;</label><span class="akasha-input-wrapper">
                                                            <textarea name="note" class="input-text " id="order_comments" placeholder="" rows="1" cols="2"></textarea>
                                                        </span>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <h3 id="order_review_heading">Đơn hàng</h3> --}}
                                <div id="order_review" class="akasha-checkout-review-order ">
                                    <table class="shop_table akasha-checkout-review-order-table bg-white shadow"
                                     style="border-radius:10px;">
                                        <thead >
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Giá</th>
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
                                                    <tr class="cart_item">
                                                        <td class="product-name d-flex" style="align-items: center;">
                                                            <img src="{{asset($item[1])}}"  alt="" style="width:50px; height:50px;">
                                                            <br>
                                                            <strong class="ml-2">
                                                                {{ $item[2] }}

                                                            </strong>
                                                            <strong
                                                                class="product-quantity ml-2">×
                                                                {{ $item[4] }}
                                                            </strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>
                                                                    {{  (number_format($item[6])) }}
                                                                </span>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>
                                    
                                        <tfoot>
                                            <tr class="cart-subtotal" >
                                               
                                                <th >Tạm tính</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount" id="tamtinh"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>
                                                    </td>
                                                @else
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount" id="tamtinh"><span
                                                                class="akasha-Price-currencySymbol"></span>0</span>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="cart-subtotal" >
                                               
                                                <th >Voucher </th>
                                               
                                                @if (!$vouchers)
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount" id="voucher_ne"><span
                                                                class="akasha-Price-currencySymbol"></span>0</span>
                                                    </td>
                                                @else
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount" id="voucher_ne"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($vouchers['total']) }}</span>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="cart-subtotal" >
                                               
                                                <th >Phí ship </th>
                                               
                                                    @php
                                                        $tinh_phi = 0;
                                                    @endphp
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol" id="phiship">
                                                                @if (isset($cart) && is_array($cart))
                                                               
                                                                    @if(!$vouchers)
                                                                        @php
                                                                            $tinh_phi = $tong*10/100;
                                                                        @endphp
                                                                        {{ number_format($tong*10/100) }}
                                                                    @else
                                                                        @php
                                                                            $tinh_phi = ($tong - $vouchers['total'])*10/100;
                                                                        @endphp
                                                                        {{ number_format(($tong - $vouchers['total'])*10/100) }}
                                                                    @endif
                                                                @else
                                                                    0
                                                                @endif
                                                            </span></span>
                                                                
                                                    </td>
                                               
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))

                                                    @if(!$vouchers)
                                                        <td data-title="Subtotal"><span
                                                                class="akasha-Price-amount amount" id="tongtien"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($tong + $tinh_phi) }}</span>
                                                        </td>
                                                    @else
                                                        <td data-title="Subtotal"><span
                                                                class="akasha-Price-amount amount" id="tongtien"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($tong - $vouchers['total'] + $tinh_phi) }}</span>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td><strong><span class="akasha-Price-amount amount" id="tongtien"><span
                                                                    class="akasha-Price-currencySymbol"></span>0</span></strong>
                                                    </td>
                                                @endif

                                            </tr>
                                        </tfoot>
                                    </table>
                                    <input type="hidden" name="lang" value="en">
                                    <input type="hidden" name="tienship" id="tienship" value="{{ $tinh_phi }}">
                                    <div id="payment" class="akasha-checkout-payment bg-white shadow">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio"
                                                    name="payment_type" value="offline" data-order_button_text="" checked>
                                                <label for="payment_method_cod">
                                                    Tiền mặt </label>
                                                <div class="payment_box payment_method_cod" style="display:none;">
                                                    <p>Nhận hàng và thanh toán</p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_bacs">
                                                <input id="payment_method_bacs" type="radio" class="input-radio"
                                                    name="payment_type" value="redirect" data-order_button_text="">
                                                <label for="payment_method_bacs">
                                                    Chuyển khoản (VNPAY)</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>STK: 070706072002 </p>
                                                    <p>Ngân hàng: Sacombank</p>
                                                    <p>Chủ tài khoản: LUU NGUYEN TRUC NGAN</p>
                                                </div>
                                            </li>
                                            {{-- <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio"
                                                    name="payment_type" value="momo" data-order_button_text="">
                                                <label for="payment_method_cod">
                                                    Chuyển khoản momo </label>
                                                <div class="payment_box payment_method_cod" style="display:none;">
                                                    <p>Nhận hàng và thanh toán</p>
                                                </div>
                                            </li> --}}
                                            @error('payment_type')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </ul>
                                        <div class="form-row place-order">
                                            <div class="akasha-terms-and-conditions-wrapper">
                                                <div class="akasha-privacy-policy-text">
                                                    <p> <a href="#" class="akasha-privacy-policy-link"
                                                            target="_blank">Đọc kĩ hướng dẫn và điều khoản của chúng
                                                            tôi</a>.</p>
                                                </div>
                                            </div>
                                            <button type="submit" class="button alt mt-3" name="akasha_checkout_place_order"
                                                id="place_order" value="Place order" data-value="Place order" style="background-color:#C92127; border:1px solid #C92127 !important;  !important; cursor: pointer; font-weight:bold;">
                                                Thanh toán
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
         function ChooseProvinces(){
            var provinceid = $('#provinceid').val();
            $.ajax({
                url: "{{ route('address.getProvinceid')}}",
                type: 'GET',
                data: {provinceid: provinceid},
                success: function(data) {
                    var html = '<option selected value=""> - - - Chọn huyện - - - </option>';
                    for(var i = 0; i < data.length; i++){
                        
                        html += '<option value="' + data[i].districtid + '">' + data[i].type + ' - ' + data[i].name + '</option>';
                    }
                    $('#cityid').html(html);
                }
            });
        }

        function ChooseWardid(){
            var cityid = $('#cityid').val();
            $.ajax({
                url: "{{ route('address.getCityid')}}",
                type: 'GET',
                data: {cityid: cityid},
                success: function(data) {
                    var html = '<option selected value=""> - - - Chọn xã/phường- - - </option>';
                    for(var i = 0; i < data.length; i++){
                        html += '<option value="' + data[i].wardid + '">' + data[i].type + ' - ' + data[i].name + '</option>';
                    }
                    $('#wardid').html(html);
                }
            });
        }
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        // function Ward(){
        //     var wardid = $('#wardid').val();
        //     var cityid = $('#cityid').val();
        //     var provinceid = $('#provinceid').val();
        //     $.ajax({
        //         url: "{{ route('address.checkprice')}}",
        //         type: 'GET',
        //         data: {
        //             wardid: wardid,
        //             cityid: cityid,
        //             provinceid: provinceid
        //         },
        //         success: function(data) {
        //             $('#phiship').text(formatNumber(data));
        //             $('#tienship').val(data);
        //             var tamtinh = $('#tamtinh').text();
        //             var price = parseInt(tamtinh.replaceAll(',', ''));
        //             var part = parseInt(data);
        //             //var voucher = $('#voucher_ne').text();
        //             // var parse_voucher = parseInt(voucher.replaceAll(',', ''));
                   
              

        //             $('#tongtien').text(formatNumber(part + price - parse_voucher));
        //         }
        //     });
        // }
    </script>

@endsection
