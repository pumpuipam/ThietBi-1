<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        i {
            font-size: 12px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .title {
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="title">
        {{-- <a href=""><img width="120"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYe0iNiURDPZV0cuwQpZOXjNM6Prdo9INHCPOc0v8C7g&s"
                title="logo" alt="logo"></a> --}}
        <h2 style="text-align: center;">Đơn đặt hàng mã OR000{{ $order->id }}</h2>
    </div>

    <i>Khách hàng : {{ $order->firstName }}
    </i><br>
    <i style="text-align:right;">Số điện thoại :{{ $order->phone }}</i><br>
    <i>Email :{{ $user->email }}</i><br>
    <i>Địa chỉ :{{ $user->address }}</i>

    <div>
        <h5> <i class="far fa-calendar-minus scale3 me-3"></i>Phương thức thanh toán:
            {{ $paymentType }} </h5>
    </div>

    <table class="me-3">
        <thead>
            <tr>
                <th>Đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailOrder as $order)
                @foreach ($products as $product)
                    @if ($order->product_id == $product->id)
                        <tr>
                            <td style="color: #0099FF;"> <b>DH{{ substr('000000' . $order->id, -6) }}</b></td>
                            <td style="color: black;"> <b>
                                    {{ $product->name }}
                                </b></td>
                            <td>{{ $order->quantity }}</td>
                            <td><i style="color: #006600;">{{ number_format($order->price + $order->discount) }} đ</i>
                            </td>
                            <td style="color: #0099FF;">
                                @if ($order->discount)
                                    {{ number_format($order->discount) }} đ
                                @else
                                    <span>0 đ</span>
                                @endif
                            </td>
                            <td style="color: #FF0000;">
                                <b>
                                    {{ number_format($order->total_payment) }} đ
                                </b>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    <div style="text-align:center;">
        <div class="me-10 mb-sm-0 mb-3">
            <h3 class="mb-2">Tổng hóa đơn</h3>
            <hr style="width:10%;">
            <h3 class="mb-0 card-title" style="color: blue;">
                <b><var>{{ number_format($totalPayment) }} đ</var></b>
            </h3>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <span><i>Nếu chuyển khoản vui lòng chụp lại hoá đơn thanh toán gửi qua mail để chúng tôi xác nhận.</i></span>
    </div>
{{-- 
    <div style="margin-top: 30px;text-align: center;">
        <span><i style="font-weight: bold;color:orangered;">Bán khách sạn</i> - Bài tập nhóm</span>
    </div> --}}

</body>

</html>
