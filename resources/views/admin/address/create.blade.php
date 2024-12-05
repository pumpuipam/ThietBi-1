@extends('layouts.admin.master')

@section('title', 'Thêm sản phẩm')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
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
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Thêm sản phẩm</h4>

                                <form id="frm1" class="custom-validation" action="{{ route('address.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                   

                                    <div class="mb-3">
                                        <label class="form-label">Giá <span class="text-danger">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control" onchange="ChangePrice()" onkeyup="ChangePrice()"
                                            value="{{ old('price', isset($request['price']) ? $request['price'] : '') }}">
                                        @error('price')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Chọn Tỉnh / Thành phố<span
                                                class="text-danger">*</span></label>
                                        <select  class="form-select" name="provinceid" id="provinceid" onchange="ChooseProvinces()">
                                            <option selected value=""> - - - Chọn tỉnh / thành phố- - - </option>
                                            @foreach($provinces as $province)
                                                <option value="{{ $province->provinceid }}">{{ $province->type }} - {{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('provinceid')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Chọn Quận / huyện <span
                                                class="text-danger">*</span></label>
                                        <select  class="form-select" name="cityid" id="cityid" onchange="ChooseWardid()">
                                            <option selected value=""> - - - Chọn huyện - - - </option>
                                          
                                        </select>
                                        @error('cityid')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Chọn Xã / Phường <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="wardid" id="wardid" >
                                            <option selected value=""> - - - Chọn tỉnh - - - </option>
                                          
                                        </select>
                                        @error('wardid')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                 
                                    <input type="text" name="created_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Thêm
                                            </button>
                                            <a href="{{ route('address.index') }}"
                                                class="btn btn-secondary waves-effect">Quay lại</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
         function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function ChangePrice(){
            var price = $('#price').val().replaceAll(',', '');
            var formattedPrice = formatNumber(price);
            $('#price').val(formattedPrice);
        }
        function ChangePrice_Discount(){
            
            var price = $('#discount').val().replaceAll(',', '');
            var formattedPrice = formatNumber(price);
            $('#discount').val(formattedPrice);
        }


        function ChooseProvinces(){
            var provinceid = $('#provinceid').val();
            $.ajax({
                url: "{{ route('address.getProvinceid')}}",
                type: 'GET',
                data: {provinceid: provinceid},
                success: function(data) {
                    var html = '<option selected value=""> - - - Chọn huyện - - - </option>';
                    for(var i = 0; i < data.length; i++){
                        console.log(data[i]);
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

        
        CKEDITOR.replace("description");
    </script>
@endsection
