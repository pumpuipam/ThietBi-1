@extends('layouts.admin.master')

@section('title', 'Sửa sản phẩm')

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

                                <h4 class="card-title mb-4">Sửa sản phẩm</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Products_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tên <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $product->name }}">
                                        @error('name')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Giá <span class="text-danger">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control"  onchange="ChangePrice()" onkeyup="ChangePrice()"
                                            value="{{ number_format($product->price)  }}">
                                        @error('price')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Giá giảm<span class="text-danger">*</span></label>
                                        <input type="text" name="discount" id="discount" class="form-control" 
                                        onchange="ChangePrice_Discount()" onkeyup="ChangePrice_Discount()"
                                            value="{{ number_format((int)($product->discount ?? 0))  }}">
                                        @error('discount')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Số lượng <span class="text-danger">*</span></label>
                                        <input type="number" name="quantity" id="price" class="form-control" onchange="ChangePrice()" onkeyup="ChangePrice()"
                                            value="{{$product->quantity ?? 0  }}">
                                        @error('quantity')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    

                                    <div class="mb-3">
                                        <label class="form-label">Nhóm sản phẩm <span
                                                class="text-danger">*</span></label>
                                        <select name="cate_id" id="" class="form-control">
                                            @foreach ($cate_id as $cate)
                                                <option value="{{ $cate->id }}"
                                                    {{ isset($product) && $product->cate_id === $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->name }}</option>
                                            @endforeach
                                            @error('cate_id')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Thể loại <span
                                                class="text-danger">*</span></label>
                                           
                                        <select name="type_id" class="form-select" id="validationCustom04">
                                         
                                            @foreach ($TypeProduct as $type)
                                                <option value="{{ $type->id }}" @if($type->id == $product->type_id ) selected @endif>{{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nhà cung cấp <span
                                                class="text-danger">*</span></label>
                                        <select name="supplier_id" class="form-select" id="validationCustom04">
                                            <option selected value="">Chọn nhà cung cấp</option>
                                            @foreach ($Supplier as $Supp)
                                                <option value="{{ $Supp->id }}"
                                                    @if($product->supplier_id == $Supp->id) selected @endif>{{ $Supp->name }} - {{ $Supp->phone }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <textarea name="short_description" class="form-control" rows="1">{{ $product->short_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Điểm tích lũy<span class="text-danger">*</span></label>
                                        <input type="text" name="points" id="points" class="form-control" 
                                        onchange="ChangePrice_DiscountP()" onkeyup="ChangePrice_DiscountP()"
                                            value="{{number_format($product->points ?? 0)  }}">
                                        @error('points')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                        @error('description')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images" class="mb-2 form-file-input form-control">
                                                @if (isset($product) && $product->image)
                                                    <img src=" {{asset($product->image)}}"
                                                        alt="{{ $product->name }}" width="100">
                                                @endif
                                                @error('images')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh mô tả <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="image_description[]" class="
                                                mb-2 form-file-input form-control" multiple>
                                                @if (isset($product) && $product->image_description)
                                               
                                                    @foreach(json_decode($product->image_description) as $image_description)
                                                            <img src="{{ asset($image_description) }}" alt="{{ $product->name }}"
                                                            style="max-width:80px; height:80px; object-fit:cover;">

                                                    @endforeach
                                                @endif
                                                @error('image_description')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                   
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái </label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option value="1"
                                                {{ isset($product) && $product->status === 1 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="2"
                                                {{ isset($product) && $product->status === 2 ? 'selected' : '' }}>
                                                Không hoạt động</option>
                                          
                                        </select>
                                        @error('status')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="text" name="updated_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div>
                                            @if(auth()->user()->role_id === 1)
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Cập nhật
                                                </button>
                                            @endif
                                            <a href="{{ route('route_BackEnd_Products_List') }}"
                                                class="btn btn-secondary waves-effect">Huỷ</a>
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
        function ChangePrice_DiscountP(){
            var price = $('#points').val().replaceAll(',', '');
            var formattedPrice = formatNumber(price);
            $('#points').val(formattedPrice);
        }
       CKEDITOR.replace("description");
   </script>
@endsection
