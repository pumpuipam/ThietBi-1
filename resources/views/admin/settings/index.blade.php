@extends('layouts.admin.master')

@section('title', 'Danh sách khuyến mãi')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <style>
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .width-90 {
            width: 90px !important;
        }

        .rounded-3 {
            border-radius: 0.5rem !important;
        }

        a {
            text-decoration: none;
        }
    </style>
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
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">MỨC ĐỘ THÀNH VIÊN</h4>

                                </div>

                            </div>
                            <div class="table-responsive">
                                <div class="container">
                                    <div class="row pb-3">
                                        <form action="{{ route('setting.store') }}" method="POST">
                                            @csrf
                                            <div class="col-md-12">
                                                <label for="">Thành viên đồng</label>
                                                <input type="text" class="form-control" name="broze" value="{{ number_format( $setting[0]->points )}}"  onkeyup="formatNumber(this)">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label for="">Thành viên bạc</label>
                                                <input type="text" class="form-control" name="silver" value="{{ number_format( $setting[1]->points)}}"  onkeyup="formatNumber(this)">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label for="">Thành viên vàng</label>
                                                <input type="text" class="form-control" name="gold" value="{{ number_format( $setting[2]->points) }}"  onkeyup="formatNumber(this)">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label for="">Thành viên kim cương</label>
                                                <input type="text" class="form-control" name="diamond" value="{{ number_format( $setting[3]->points)}}"  onkeyup="formatNumber(this)">
                                            </div>
                                            <div class="col-md-3">
                                                @if(auth()->user()->role_id === 1)

                                            <button class="btn btn-primary mt-3">
                                                Cập nhật
                                            </button>
                                            @endif
                                            
                                        </form>
                                       </div>


                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function formatNumber(input) {
            // Remove non-numeric characters except for period
            let value = input.value.replace(/,/g, '');
            
            // Format the number with commas
            input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        }
        </script>
@endsection
