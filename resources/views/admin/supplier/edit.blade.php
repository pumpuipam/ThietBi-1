@extends('layouts.admin.master')

@section('title', 'Sửa nhà cung cấp')

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

                                <h4 class="card-title mb-4">Sửa nhà cung cấp</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Suppliers_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tên nhà cung cấp<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $supplier->name }}">
                                        @error('name')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-Mail </label>
                                        <div>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $supplier->email }}" parsley-type="email">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                        <div>
                                            <input data-parsley-type="number" name="phone" type="text"
                                                class="form-control" value="{{ $supplier->phone }}">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <div>
                                            <input data-parsley-type="text" name="address" type="text"
                                                class="form-control" value="{{ $supplier->address }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả </label>
                                        <div>
                                            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $supplier->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái </label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option value="1"
                                                {{ isset($supplier) && $supplier->status === 1 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="2"
                                                {{ isset($supplier) && $supplier->status === 2 ? 'selected' : '' }}>
                                                Không hoạt động</option>
                                            {{-- <option value="0"
                                                {{ isset($supplier) && $supplier->status === 0 ? 'selected' : '' }}>
                                                Khóa</option> --}}
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
                                            <a href="{{ route('route_BackEnd_Suppliers_List') }}"
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
