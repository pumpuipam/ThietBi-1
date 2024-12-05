@extends('layouts.admin.master')

@section('title', 'Sửa quản trị viên')

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

                                <h4 class="card-title mb-4">Sửa quản trị viên</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Admin_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tên <span class="text-danger">*</span></label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $admin->username }}">
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
                                                value="{{ $admin->email }}" parsley-type="email">
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
                                            <input type="password" name="password" id="pass2" class="form-control"
                                                value="{{ $admin->password }}">
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
                                            <input data-parsley-type="number" name="phone" type="text"
                                                class="form-control" value="{{ $admin->phone }}">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images" class="form-file-input form-control">
                                                @if (isset($admin) && $admin->avatar)
                                                    <img src="{{ asset($admin->avatar ? '' . Storage::url($admin->avatar) : $admin->name) }}"
                                                        alt="{{ $admin->username }}" width="100">
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
                                        <label class="form-label">Quyền<span class="text-danger">*</span></label>
                                        <select name="role" class="form-select" id="validationCustom04">
                                            <option value="0"
                                                {{ isset($admin) && $admin->role === 0 ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="1"
                                                {{ isset($admin) && $admin->role === 1 ? 'selected' : '' }}>
                                                Khách hàng</option>
                                        </select>
                                        @error('role')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option value="1"
                                                {{ isset($admin) && $admin->status === 1 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="2"
                                                {{ isset($admin) && $admin->status === 2 ? 'selected' : '' }}>
                                                Không hoạt động</option>
                                            <option value="0"
                                                {{ isset($admin) && $admin->status === 0 ? 'selected' : '' }}>
                                                Khóa</option>
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
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Cập nhật
                                            </button>
                                            <a href="{{ route('route_BackEnd_Admin_List') }}"
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

@endsection
