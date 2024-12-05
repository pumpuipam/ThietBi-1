@extends('layouts.admin.master')

@section('title', 'Thêm khách hàng')

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

                                <h4 class="card-title mb-4">Thêm khách hàng</h4>

                                <form id="frm1" class="custom-validation" action="" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tên <span class="text-danger">*</span></label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ old('username', isset($request['username']) ? $request['username'] : '') }}">
                                        @error('username')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-Mail <span class="text-danger">*</span></label>
                                        <div>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', isset($request['email']) ? $request['email'] : '') }}">
                                            @error('email')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                        <div>
                                            <input type="password" name="password" id="password" class="form-control"
                                                value="{{ old('password', isset($request['password']) ? $request['password'] : '') }}">
                                            @error('password')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                        <div>
                                            <input data-parsley-type="number" name="phone" type="number"
                                                class="form-control"
                                                value="{{ old('phone', isset($request['phone']) ? $request['phone'] : '') }}">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số nhà </label>
                                        <div>
                                            <input data-parsley-type="number" name="apartment_number" type="text"
                                                class="form-control"
                                                value="{{ old('apartment_number', isset($request['apartment_number']) ? $request['apartment_number'] : '') }}">
                                           
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ cá nhân</label>
                                        <div>
                                            <input data-parsley-type="number" name="address" type="text"
                                                class="form-control"
                                                value="{{ old('address', isset($request['address']) ? $request['address'] : '') }}">
                                           
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh </label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images" class="form-file-input form-control">
                                                @if (isset($customer) && $customer->avatar)
                                                    <img src="{{ asset($customer->avatar) }}"
                                                        alt="{{ $customer->username }}" width="100">
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
                                        <label class="form-label">Quyền</label>
                                        <select name="role" class="form-select" id="validationCustom04">
                                          
                                            <option value="2">Nhân viên</option>
                                            <option value="4">Nhân viên giao hàng</option>

                                        </select>
                                        @error('role')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái </label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option selected value="1">Hoạt động</option>
                                            <option value="2">Không hoạt động</option>
                                            <option value="0">Khóa</option>
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
                                            <a href="{{ route('route_BackEnd_Customers_List') }}"
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

@endsection
