@extends('layouts.admin.master')

@section('title', 'Thêm khuyến mãi')

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

                                <h4 class="card-title mb-4">Thêm khuyến mãi</h4>

                                <form  class="custom-validation" action="{{ route('promotion.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $Promotion->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Tên <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                        value="{{ $Promotion->name }}"
                                        required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mã khuyến mãi <span class="text-danger">*</span></label>
                                        <input type="text" name="code" class="form-control"
                                         value="{{ $Promotion->code }}"
                                        required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Số lượng <span class="text-danger">*</span></label>
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            value="{{ $Promotion->quantity }}"
                                             required>
                                      
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hình thức khuyến mãi <span class="text-danger">*</span></label>
                                       
                                        <div class="d-flex">
                                            <div>
                                                <input type="radio" name="form" value="1" 
                                                @if($Promotion->form == 1)
                                                    checked
                                                @endif
                                                
                                                >
                                                <label class="form-label">VNĐ</label>
    
                                            </div>
                                            {{-- <div  style="margin-left:50px !important;">
                                                <input type="radio" name="form" value="2"
                                                @if($Promotion->form == 2)
                                                checked
                                            @endif>
                                                <label class="form-label">%</label>

    
                                            </div> --}}
                                          
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số tiền <span class="text-danger">*</span></label>
                                        <input type="text" name="total" class="form-control"
                                        id="total"
                                        value="{{ number_format($Promotion->total) }}"
                                        onkeyup="ChangePrice()"  required>
                                      
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-0">Khuyến mãi không tính thời gian <span class="text-danger">*</span></label>
                                        <input type="checkbox" class="mb-0" id="condition" name="condition"
                                        @if($Promotion->condition == 1)
                                                checked
                                        @endif
                                        value="1">
                                      
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Thời gian bắt đầu <span class="text-danger">*</span></label>
                                        <input type="date" name="start_time" id="start_time" 
                                        
                                        
                                        @if($Promotion->condition == 1)
                                                disabled
                                        @else
                                                value="{{ \Carbon\Carbon::parse($Promotion->start_time)->format('Y-m-d') }}"
                                        @endif
                                        class="form-control">
                                      
                                            <div class="mb-3">
                                                <label class="form-label">Thời gian kết thúc <span class="text-danger">*</span></label>
                                                <input type="date" name="end_time"
                                                @if($Promotion->condition == 1)
                                                disabled
                                                @else
                                                value="{{ \Carbon\Carbon::parse($Promotion->end_time)->format('Y-m-d') }}"
                                                @endif
                                                
                                                id="end_time" class="form-control">
                                              
                                            </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái </label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option value="1"
                                            @if($Promotion->status == 1)
                                                selected
                                            @endif
                                            >Hoạt động</option>
                                            <option value="2"
                                            
                                            @if($Promotion->status == 2)
                                                selected
                                            @endif
                                            >Không hoạt động</option>
                                          
                                        </select>
                                        @error('status')
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
                                            <a href="{{ route('promotion.index') }}"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#condition').on('click',function(){
            if ($(this).is(':checked')) {
                $('#end_time').prop('disabled',true);
                $('#start_time').prop('disabled',true);

            } else {
                $('#end_time').prop('disabled',false);
                $('#start_time').prop('disabled',false);
            }
        });
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function ChangePrice(){
            var price = $('#total').val().replaceAll(',', '');
            var formattedPrice = formatNumber(price);
            $('#total').val(formattedPrice);
        }
    </script>
@endsection
