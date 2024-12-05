{{-- @extends('layouts.admin.master')

@section('title', 'Sửa bình luận')

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

                                <h4 class="card-title mb-4">Sửa bình luận</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Comment_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Sản phẩm <span class="text-danger">*</span></label>
                                            <select name="product_id" id="" class="form-control">
                                                @foreach ($product_id as $cate)
                                                    <option value="{{ $cate->id }}"
                                                        {{ isset($comment) && $comment->product_id === $cate->id ? 'selected' : '' }}>
                                                        {{ $cate->name }}</option>
                                                @endforeach
                                                @error('product_id')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Ngươid dùng <span class="text-danger">*</span></label>
                                            <select name="user_id" id="" class="form-control">
                                                @foreach ($user_id as $a)
                                                    <option value="{{ $a->id }}"
                                                        {{ isset($comment) && $comment->user_id === $a->id ? 'selected' : '' }}>
                                                        {{ $a->username }}</option>
                                                @endforeach
                                                @error('user_id')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nội dung bình luận<span
                                                class="text-danger">*</span></label>
                                        <div>
                                            <textarea name="content" data-parsley-type="text" id="summernote" class="form-control" rows="5">{!! $comment->content !!}</textarea>
                                            @error('content')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái </label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option value="1"
                                                {{ isset($comment) && $comment->status === 1 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="0"
                                                {{ isset($comment) && $comment->status === 0 ? 'selected' : '' }}>
                                                Không hoạt động</option>
                                        </select>
                                        @error('status')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="text" name="updated_at" id="updated_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Cập nhật
                                            </button>
                                            <a href="{{ route('route_BackEnd_Comment_List') }}"
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

@section('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Nội dung',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection --}}

@extends('layouts.admin.master')

@section('title', 'Danh sách bình luận theo sản phẩm')

@section('content')

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
                                {{-- <h4 class="card-title mb-4">Danh sách bình luận</h4> --}}
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Người bình luận</th>
                                                <th scope="col">Nội dung</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($product->id)
                                                <span class="mb-4"
                                                    style="font-weight: 500; font-size: 18px; color: #00abc4">Sản phẩm:
                                                    {{ $product->name }}</span>
                                            @else
                                                <span></span>
                                            @endif
                                            @forelse ($comment as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'CM000' . $item->id }}</th>
                                                    <td>
                                                        @if ($item->user)
                                                            <span>{{ $item->user->username }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->content }}
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form method="post"
                                                                action="{{ route('route_BackEnd_Comment_Delete', $item->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                                                    class="btn btn-danger btn-sm">Xoá</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan="12" style="color: red !important">Không có bản ghi</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
