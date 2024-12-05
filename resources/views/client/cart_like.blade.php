@extends('layouts.client.master')

@section('title', 'Giỏ hàng')

@section('content')

    <main class="site-main main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <h2 class="p-3 d-flex" style="background-color:#FCDDEF; align-items:center; border-radius:10px;">
                                <img src="https://cdn0.fahasa.com/media/wysiwyg/Duy-VHDT/Danh-muc-san-pham/Icon_VanPhongPham_T6.png"
                                    alt="" style="width:30px; height:30px;">
                                <p class="ml-2 mb-0" style="font-size:18px;"> Sản phẩm yêu thích</p>
                            </h2>
                            <div class="akasha-notices-wrapper"></div>
                            <form class="akasha-cart-form shadow">
                                <table class="shop_table shop_table_responsive cart akasha-cart-form__contents"
                                    cellspacing="0">
                                    <thead style="border-bottom: 1px solid #C92127;">
                                        <tr class="bg-white">
                                            <th><a onclick="return confirm('Bạn có chắc muốn xóa hết đơn hàng không?')"
                                                    href="{{ route('cartDeleteLikeAll') }}"> <i
                                                        class="fa-solid fa-trash-can-arrow-up"></i></a></th>


                                            <th class="product-name ">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng giá</th>
                                            <th>Thêm vào giỏ</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @php
                                            $cart = session('cart_like');
                                            $tong = 0;
                                        @endphp
                                        @if ($cart)
                                            @for ($i = 0; $i < count($cart); $i++)
                                                @php
                                                    $item = $cart[$i];

                                                    $tong += $item[7];
                                                @endphp
                                                <tr class="akasha-cart-form__cart-item cart_item">
                                                    <td class="product-remove" style="border:none;">
                                                        <a class="remove"
                                                            onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                                            href="{{ route('cartDeleteLikeOne', $i) }}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-thumbnail d-flex" style="border:none !important;">
                                                        <img class="attachment-akasha_thumbnail size-akasha_thumbnail"
                                                            src="{{ asset($item[1]) }}" alt="" width="600"
                                                            height="778" style="border-radius:5px;">

                                                        <div class="product-name ml-3" data-title="Product"
                                                            style="border:none !important;">
                                                            {{ $item[2] }}
                                                            <br>
                                                            <span
                                                                style="font-weight:500; font-size:12px; color:#C92127 !important;">Số
                                                                lượng còn lại:
                                                                <span id="quantity_product_{{ $i }}">
                                                                    {{ $item[8] }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <span class="akasha-Price-amount amount "
                                                            id="amout_{{ $i }}"
                                                            style="color:#C92127 !important; font-weight:500;"><span
                                                                class="akasha-Price-currencySymbol"></span>
                                                            {{ number_format($item[6]) }}

                                                        </span>

                                                        <span style="color:#C92127 !important; font-weight:500;">/vnđ</span>
                                                        @if ((int) $item[6] != (int) $item[3])
                                                            <p class="mb-0 ml-3"
                                                                style="font-size:12px; text-decoration-line:line-through; ">
                                                                {{ number_format($item[3]) }} </p>
                                                        @endif

                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">
                                                            <div class="control">
                                                                <a class="btn-number qtyminus quantity-minus" href="#"
                                                                    onclick="CheckMinus({{ $i }})">-</a>
                                                                <input type="text" id="input_{{ $i }}"
                                                                    value="{{ $item[4] }}" title="Qty" onkeyup="OnKey({{ $i }})"
                                                                    class="input-qty input-text qty text">
                                                                <a class="btn-number qtyplus quantity-plus" href="#"
                                                                    onclick="CheckPlus({{ $i }})">+</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        <span class="akasha-Price-amount amount"
                                                            id="tottal_{{ $i }}"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($item[7]) }}</span>
                                                        <span>/vnđ</span>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        <a href="{{ route('route_FrontEnd_Cart_Like_Add_One', ['index' => $i]) }}"
                                                            style="cursor: pointer; color: #C92127 !important; background:none; font-size:18px;">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endif

                                    </tbody>
                                </table>
                            </form>
                            <div class="cart-collaterals ">
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
                                                    <td data-title="Subtotal"><span class="akasha-Price-amount amount"
                                                            id="total_tamp"><span
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
                                                            class="akasha-Price-currencySymbol"></span>0</span>
                                                    <span>/vnđ</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total ">
                                                <th>Tổng</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Total"><strong><span class="akasha-Price-amount amount"
                                                                id="total_end"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span></strong>
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

                                    <div class="akasha-proceed-to-checkout mt-5 ">
                                        <a href="{{ route('route_FrontEnd_Cart_Like_Add') }}"
                                            class="checkout-button button alt akasha-forward shadow"
                                            style="border-radius:20px;">
                                            Thêm toàn bộ vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function CheckMinus(id) {
            var input = $('#input_' + id).val();
            if (parseInt(input) > 1) {
                $('#input_' + id).val(parseInt(input) - 1);
                ChangePrice(id, parseInt(input - 1))
                $.ajax({
                    url: "{{ route('updateQuantityLike') }}",
                    method: "GET",
                    data: {
                        id: id,
                        value: parseInt(input) - 1,
                    },
                    success: function(data) {

                        $('#total_end').text(formatNumber(data.total));
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

        function CheckPlus(id) {
            var input = $('#input_' + id).val();
            var Input_number = parseInt(input) + 1;
            var quantity_product = $('#quantity_product_' + id).text();
            var quantity_new = 0;
            if (Input_number > parseInt(quantity_product)) {
                alert('Số lượng tối đa là: ' + quantity_product);
                $('#input_' + id).val(parseInt(quantity_product));
                quantity_new = parseInt(quantity_product);
            } else {
                quantity_new = Input_number;
                $('#input_' + id).val(Input_number);
            }


            ChangePrice(id, parseInt(input) + 1);
            $.ajax({
                url: "{{ route('updateQuantityLike') }}",
                method: "GET",
                data: {
                    id: id,
                    value: quantity_new,
                },
                success: function(data) {

                    $('#total_end').text(formatNumber(data.total));
                    $('#total_tamp').text(formatNumber(data.total));


                }
            })

        }

        function ChangePrice(id, value) {

            var amount = $('#amout_' + id).text().replaceAll(',', '');
            var text = amount * value;

            $('#tottal_' + id).text(formatNumber(text));

        }
    </script>
@endsection
