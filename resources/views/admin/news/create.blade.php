@extends('layouts.admin.master')

@section('title', 'Thêm quản bài viết')

@section('css')

@endsection

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

                                <h4 class="card-title mb-4">Thêm quản bài viết</h4>

                                <form class="custom-validation" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title', isset($request['title']) ? $request['title'] : '') }}">
                                        @error('title')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Danh mục bài viết <span class="text-danger">*</span></label>
                                            <select name="cate_new_id" class="form-select" id="validationCustom04">
                                                <option selected value="">Chọn danh mục</option>
                                                @foreach ($category as $cate)
                                                    <option value="{{ $cate->id }}">{{ $cate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cate_new_id')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Người đăng <span class="text-danger">*</span></label>
                                            <select name="user_id" class="form-select" id="validationCustom04">
                                                <option selected value="">Chọn người đăng</option>
                                                @foreach ($admin as $ad)
                                                    <option value="{{ $ad->id }}">{{ $ad->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <div>
                                            <textarea name="short_desc" id="" data-parsley-type="text" class="form-control" rows="3">{{ old('short_desc', isset($request['short_desc']) ? $request['short_desc'] : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả <span class="text-danger">*</span></label>
                                        <div>
                                            <textarea id="summernote" name="description"></textarea>
                                            @error('description')
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
                                                @if (isset($new) && $new->images)
                                                    <img src="{{ asset($new->images) }}" alt="{{ $new->title }}"
                                                        width="100">
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
                                            <a href="{{ route('route_BackEnd_News_List') }}"
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
@endsection
