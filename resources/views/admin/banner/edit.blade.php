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
                                    action="{{ route('route_BackEnd_Users_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tên <span
                                            class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $users->name }}">
                                        @error('name')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-Mail <span
                                            class="text-danger">*</span></label>
                                        <div>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $users->email }}" parsley-type="email">
                                            @error('email')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu <span
                                            class="text-danger">*</span></label>
                                        <div>
                                            <input type="password" name="password" id="pass2" class="form-control"
                                                value="{{ $users->password }}">
                                            @error('password')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                        <div>
                                            <input data-parsley-type="number" name="phone_number" type="text"
                                                class="form-control" value="{{ $users->phone_number }}">
                                            @error('phone_number')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ngày sinh <span
                                            class="text-danger">*</span></label>
                                        <div>
                                            <input class="form-control" name="date_of_birthday" type="date"
                                                value="{{ $users->date_of_birthday }}" id="example-date-input">
                                            @error('date_of_birthday')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh <span
                                            class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images" class="form-file-input form-control">
                                                @if (isset($users) && $users->avatar)
                                                    <img src="{{ asset($users->avatar ? '' . Storage::url($users->avatar) : $users->name) }}"
                                                        alt="{{ $users->name }}" width="100">
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
                                        <label class="form-label">Trạng thái <span
                                            class="text-danger">*</span></label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option selected value="">Chọn trạng thái</option>
                                            <option value="1"
                                                {{ isset($users) && $users->status === 1 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="2"
                                                {{ isset($users) && $users->status === 2 ? 'selected' : '' }}>
                                                Không hoạt động</option>
                                            <option value="0"
                                                {{ isset($users) && $users->status === 0 ? 'selected' : '' }}>
                                                Khóa</option>
                                            </select>
                                            @error('status')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                    </div>
                                    <input type="text" name="updated_at" value="{{date("Y-m-d H:i:s", strtotime("now"))}}" hidden>
                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Cập nhật
                                            </button>
                                            <a href="{{ route('route_BackEnd_Users_List') }}"
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
