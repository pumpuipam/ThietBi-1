@extends('layouts.admin.master')

@section('title', 'Thêm phiếu nhập')

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

                                <h4 class="card-title mb-4">Thêm phiếu nhập</h4>

                                <form id="frm1" class="custom-validation" action="{{ route('inventory.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tên người lập phiếu <span class="text-danger">*</span></label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $inventory->User->username }}" disabled>
                                    </div>
                                    <input type="hidden" name="id" value="{{  $inventory->id }}">
                                    <input type="hidden" name="user_add" value="{{ $inventory->user_id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nhà cung cấp </label>
                                        <select name="supplier" class="form-select" id="validationCustom04">
                                            <option value="" selected>- - - Chọn nhà cung cấp - - -</option>
                                            @foreach($suppliers as $supplier)
                                            
                                                <option value="{{ $supplier->id }}" {{ $inventory->supplier == $supplier ? 'selected' : '' }}>{{ $supplier->name }} - {{ $supplier->phone }}</option>

                                            @endforeach
                                        </select>
                                        @error('supplier')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    @if($inventory->status == 1)

                                        <div>
                                            <a href="#" class="btn btn-success" onclick="AddProduct()">Thêm sản phẩm</a>
                                        </div>
                                    @endif
                                    @error('product_id')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                    <div>
                                        <table class="table">
                                                <thead>
                                                    <th>STT</th>
                                                    <th>TÊN SẢN PHẨM</th>
                                                    <th>SỐ LƯỢNG SẢN PHẨM</th>
                                                    <th>GIÁ NHẬP</th>
                                                    <th>Thao tác</th>
                                                </thead>
                                                <tbody id="body_id">
                                                    @php 
                                                        $number = 0;
                                                    @endphp
                                                    @if($inventory->InventoryCard)
                                                        @foreach($inventory->InventoryCard as $key => $inventory_card)
                                                        @php 
                                                            $number = $number + 1;
                                                        @endphp
                                                            <tr  id="tr_{{ $key+1 }}">
                                                           
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>
                                                                    <select name="product_id[]" class="form-select" id="validationCustom04">
                                                                        <option selected>- - - Chọn sản phẩm - - -</option>
                                                                        @foreach($products as $product)
                                                                            
                                                                            <option value="{{ $product->id }}" {{ $product->id == $inventory_card->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                  
                                                                 </    
                                                                </td>
                                                                <td><input class="form-control" type="text" name="quantity[]" 
                                                                    onkeyup="formatNumber(this)"
                                                                    value="{{ number_format($inventory_card->quantity) }}"></td>
                                                                <td><input class="form-control" type="text" name="price[]"   
                                                                    onkeyup="formatNumber1(this)" value="{{ number_format($inventory_card->price) }}""></td>
                                                                <td class="text-center">
                                                                    <button type="button" onclick="RemoveProduct(this)" 
                                                                    style="border:none; background:none;"
                                            @if($inventory->status == 2)
                                                                    disabled
                                                            @endif
                                                                    ><i class="text-danger fa-solid fa-trash"></i></button>
                                                                </td>    

                                                            </tr>

                                                        @endforeach

                                                    @endif
                                                </tbody>



                                        </table>
                                    </div>
                                    <input type="text" name="created_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div class="text-end">
                                            @if($inventory->status == 1)
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Thêm
                                                </button>
                                            @endif
                                            <a href="{{ route('inventory.index') }}"
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

    <script>
        let i = {{  $number }};
        function AddProduct(){
            html  = `
            <tr id="tr_`+( i =i+1)+`">
                <td>`+(i)+`</td>
                <td>
                    <select name="product_id[]" class="form-select" id="validationCustom04">
                        <option selected>- - - Chọn sản phẩm - - -</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                  
                 </    
                </td>
                <td><input class="form-control" type="text" name="quantity[]" 
                    onkeyup="formatNumber(this)"
                    value="0"></td>
                <td><input class="form-control" type="text" name="price[]"   onkeyup="formatNumber1(this)" value="0"></td>
                <td class="text-center">
                    <button type="button" onclick="RemoveProduct(this)" style="border:none; background:none;"><i class="text-danger fa-solid fa-trash"></i></button>
                </td>    
            </tr>
            `;
            $('#body_id').append(html);
        }

        function RemoveProduct(element) {
            $(element).closest('tr').remove();
            $('#body_id tr').each(function(index) {
                $(this).find('td:first').text(index + 1); 
                
            });
            i = $('#body_id tr').length;

        }
        function formatNumber(element) {
            let value = element.value.replace(/,/g, '');
            value = parseFloat(value).toLocaleString('en-US');
            element.value = value;
        }

        function formatNumber1(element) {
            let value = element.value.replace(/,/g, '');
            value = parseFloat(value).toLocaleString('en-US');
            element.value = value;
        }
    </script>

@endsection
