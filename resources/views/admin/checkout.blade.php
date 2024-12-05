

   

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/images/favicon1.ico') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
    
        <link
            href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/animate.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/chosen.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/jquery.scrollbar.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/lightbox.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/magnific-popup.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slick.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/fonts/flaticon.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/megamenu.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/dreaming-attribute.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.css') }}" />
        <title>@yield('title') </title>
    </head>
    <style>
          #kmacb {
        position: fixed;
        bottom: 40px;
        left: 20px;
        width: 160px;
        height: 160px;
        margin: auto;
        transition: visibility 0.5s ease 0s;
        z-index: 200000 !important;
    }
    #kmacb a {
        text-decoration: none;
    }
    #kmacb .kmacb-img-circle {
        animation: 1s ease-in-out 0s normal none infinite running kmacb-circle-img-anim;
        background: #5aaade url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAA8CAMAAADIULPRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABs1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAAAPKcAvAAAAj3RSTlMATksXN+N4FifeiTABxPV+DCj9xy2kSQnl1y8iwA13/qruG/yN5hx6ZGq8WPAm9CmU+lAYtVQLTb1jBDGzhQW6q09EHhLqDhP52a4CYM/yD8o5bgPYHxH4nsapQge4V4ZzPAjtJMzCOBCvnzZVpyHzQ4Ta36xBuetRmI6jBoPxYXvTLHXvmYvbgJfWvoc0GTlTyOIAAAABYktHRACIBR1IAAAACXBIWXMAAAsSAAALEgHS3X78AAAB8UlEQVRIx43W91cTQRAH8AWResRwQCAGjKGEmkRQQDkMVhIQC4QWCMUAErtYqEoNCqLsv8yDl3e7e3uzk+9vd/d58+Z2Zy8hBE5O7hWSXfIopVfzC7KhhfQyRcUlKNVKaSaOa07ElunUTHmF2lZSLkUuFa2q5i11X1dYDxVTUwvbGxbrvQlbH7WmDlzcesk2QNYlUdroB2yTbOubAdsiW9oK2DYb267Z24Au22DI3mq3ZNvRCTRx+46Mu6BV6+65a7X34K3rNfpEe58oEjb6+XdsI8o4HzCqP1RbYnB1HyGWcPYxQp88NalvALGRqGkHsRYCrIWhZ4gd9pp2GKv73KQvuhH6kp27V1jZEdbuKEJjY+wI+RE7zsahFGthiLXQjNAJRicRqrUyO6WpbYhRRwSpG2d2GqEz3Dh61DThYHTWMja1c/MLr5NsGxa507Mk0sLli7tvVlKZ67dcB+9E+j6Yue/+EL5Yro8cdSQE+ukze1Te9aWlkf8urAo0+ZXC+dYr2O8KSssE+kNF18TdVdF1cQ2mVFYc8ZAXlvqGWHZTUXXLsvEK2meZAyMK0u2flrJO0DbJZ+GXvdzZtRnU2J7P5tds/wCY68O0lR6lAEo0z+8d5ib/HIN/Fi4TCZzEo2m6/vf033+SRQbOwv6Y4vk50nYdHuLvx/IAAAAASUVORK5CYII=") no-repeat scroll center center;
        border: 2px solid transparent;
        border-radius: 100%;
        height: 80px;
        left: 40px;
        opacity: 0.8;
        position: absolute;
        top: 40px;
        transform-origin: 50% 50% 0;
        width: 80px;
    }
    #kmacb .kmacb-circle-fill {
        animation: 2.3s ease-in-out 0s normal none infinite running kmacb-circle-fill-anim !important;
        background: #5aaade none repeat scroll 0 0;
        border: 2px solid transparent;
        border-radius: 100%;
        height: 110px;
        left: 25px;
        opacity: 0.24;
        position: absolute;
        top: 25px;
        width: 110px;
    }
    #kmacb .kmacb-circle {
        animation: 2.2s ease-in-out 0s normal none infinite running kmacb-circle-anim !important;
        background-color: transparent;
        border: 2px solid #5aaade;
        border-radius: 100%;
        height: 100%;
        opacity: 0.35;
        position: absolute;
        width: 100%;
    }
    #kmacb:hover .kmacb-img-circle, #kmacb:hover .kmacb-circle-fill {
        background-color: #72d582;
    }
    #kmacb:hover .kmacb-circle {
        border-color: #72d582;
    }
    #kmacb:hover .kmacb-img-circle {
        animation: 1s ease-in-out 0s normal none infinite running kmacb-circle-img-anim-hover;
    }
    @keyframes kmacb-circle-anim {
    0% {
        opacity: 0.1;
        transform: rotate(0deg) scale(0.5) skew(1deg);
    }
    30% {
        opacity: 0.5;
        transform: rotate(0deg) scale(0.7) skew(1deg);
    }
    100% {
        opacity: 0.6;
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    }
    @keyframes kmacb-circle-anim {
    0% {
        opacity: 0.1;
        transform: rotate(0deg) scale(0.5) skew(1deg);
    }
    30% {
        opacity: 0.5;
        transform: rotate(0deg) scale(0.7) skew(1deg);
    }
    100% {
        opacity: 0.1;
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    }
    @keyframes kmacb-circle-fill-anim {
    0% {
        opacity: 0.2;
        transform: rotate(0deg) scale(0.7) skew(1deg);
    }
    50% {
        opacity: 0.2;
    }
    100% {
        opacity: 0.2;
        transform: rotate(0deg) scale(0.7) skew(1deg);
    }
    }
    @keyframes kmacb-circle-fill-anim {
    0% {
        opacity: 0.2;
        transform: rotate(0deg) scale(0.7) skew(1deg);
    }
    50% {
        opacity: 0.2;
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    100% {
        opacity: 0.2;
        transform: rotate(0deg) scale(0.7) skew(1deg);
    }
    }
    @keyframes kmacb-circle-img-anim {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    10% {
        transform: rotate(-25deg) scale(1) skew(1deg);
    }
    20% {
        transform: rotate(25deg) scale(1) skew(1deg);
    }
    30% {
        transform: rotate(-25deg) scale(1) skew(1deg);
    }
    40% {
        transform: rotate(25deg) scale(1) skew(1deg);
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    }
    @keyframes kmacb-circle-img-anim {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    10% {
        transform: rotate(-25deg) scale(1) skew(1deg);
    }
    20% {
        transform: rotate(25deg) scale(1) skew(1deg);
    }
    30% {
        transform: rotate(-25deg) scale(1) skew(1deg);
    }
    40% {
        transform: rotate(25deg) scale(1) skew(1deg);
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    }
    @keyframes kmacb-circle-img-anim-hover {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    10% {
        transform: rotate(-35deg) scale(1) skew(1deg);
    }
    20% {
        transform: rotate(35deg) scale(1) skew(1deg);
    }
    30% {
        transform: rotate(-35deg) scale(1) skew(1deg);
    }
    40% {
        transform: rotate(35deg) scale(1) skew(1deg);
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    }
    @keyframes kmacb-circle-img-anim-hover {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    10% {
        transform: rotate(-35deg) scale(1) skew(1deg);
    }
    20% {
        transform: rotate(35deg) scale(1) skew(1deg);
    }
    30% {
        transform: rotate(-35deg) scale(1) skew(1deg);
    }
    40% {
        transform: rotate(35deg) scale(1) skew(1deg);
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
    }
    }
    
    
    .cart-animation-helper {
        margin: 0 20%;
        width: 0;
        height: 0;
        position: relative; /* Added to make sure the :after pseudo-element is positioned correctly */
    }
    
    .cart-animation-helper:after {
        opacity: 0;
        border-radius: 0%;
        max-height: 150px; /* Replace $product-height with an actual value */
        max-width: 150px; /* Replace $product-width with an actual value */
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: 0 auto;
        display: block;
        height: 100px; /* Replace $product-height with an actual value */
        width: 100px; /* Replace $product-width with an actual value */
        background-color: #ff9a9e;
        transition: transform 0.8s ease-out, margin 0.8s ease-out, opacity 0.8s ease-out, 
                    border-radius 0.4s ease-out, max-height 0.4s ease-out, max-width 0.4s ease-out;
    }
    
    
    
    
    </style>
    <body>
      
       
        <main class="site-main main-container no-sidebar" style="padding-top: 0px">
            <div class="container">
                <h1 class="text-center">Thanh toán</h1>
                <div class="row">
                    <div class="main-content col-md-12">
                        <div class="page-main-content">
                            <div class="akasha">
                                <form name="checkout" method="post" class="checkout akasha-checkout"
                                    action="{{ route('route_FrontEnd_Create_Checkout_Admin') }}" enctype="multipart/form-data"
                                    novalidate="novalidate">
                                    @csrf
                                    <div class="col2-set" id="customer_details">
                                        <div class="col-1">
                                            <div class="akasha-billing-fields">
                                                <h3>Thông tin khách hàng</h3>
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
                                                                    <textarea name="note" class="input-text " id="order_comments" placeholder="" rows="1" cols="2"></textarea>
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
                                    <h3 id="order_review_heading">Đơn hàng</h3>
                                    <div id="order_review" class="akasha-checkout-review-order">
                                        <table class="shop_table akasha-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $cart = session('cart_admin');
                                                    $tong = 0;
                                                @endphp
    
                                                @if ($cart)
                                                    @for ($i = 0; $i < count($cart); $i++)
                                                        @php
                                                            $item = $cart[$i];
                                                            $tong += $item[7];
                                                        @endphp
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                <img src="{{asset($item[1])}}"  alt="" style="width:50px; height:50px;">
                                                                <br>
                                                                {{ $item[2] }}
                                                                <strong
                                                                    class="product-quantity">×
                                                                    {{ $item[4] }}</strong></td>
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
                                                <tr class="cart-subtotal">
                                                    <th>Tạm tính</th>
                                                    @php
                                                        $cart = session('cart_admin');
                                                    @endphp
                                                    @if (isset($cart) && is_array($cart))
                                                        <td data-title="Subtotal"><span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>
                                                        </td>
                                                    @else
                                                        <td data-title="Subtotal"><span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>0</span>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Tổng</th>
                                                    @php
                                                        $cart = session('cart_admin');
                                                    @endphp
                                                    @if (isset($cart) && is_array($cart))
                                                        <td data-title="Subtotal"><span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>
                                                        </td>
                                                    @else
                                                        <td><strong><span class="akasha-Price-amount amount"><span
                                                                        class="akasha-Price-currencySymbol"></span>0</span></strong>
                                                        </td>
                                                    @endif
    
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <input type="hidden" name="lang" value="en">
                                        <div id="payment" class="akasha-checkout-payment">
                                            {{-- <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_cod">
                                                    <input id="payment_method_cod" type="radio" class="input-radio"
                                                        name="payment_type" value="offline" data-order_button_text="" checked>
                                                    <label for="payment_method_cod">
                                                        Tiền mặt </label>
                                                    <div class="payment_box payment_method_cod" style="display:none;">
                                                        <p>Nhận hàng và thanh toán</p>
                                                    </div>
                                                </li>
                                               
                                                @error('payment_type')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </ul> --}}
                                            <input type="hidden" value="offline" name="payment_type">
                                            <div class="form-row place-order">
                                              
                                                <button type="submit" class="button alt" name="akasha_checkout_place_order"
                                                    id="place_order" value="Place order" data-value="Place order">Thanh toán
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
    
    
        <a href="#" class="backtotop active">
            <i class="fa fa-angle-up"></i>
        </a>
       
        <script src="{{ asset('client/assets/js/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/chosen.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/countdown.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/magnific-popup.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/slick.js') }}"></script>
        <script src="{{ asset('client/assets/js/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/threesixty.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/mobilemenu.js') }}"></script>
        <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
        <script src="{{ asset('client/assets/js/functions.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       
    </body>
    
    </html>
    