@extends('layouts.admin.master')

@section('title', 'Danh sách quản trị')

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
                                <h4 class="card-title mb-4">Danh sách quản trị viên</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Ngày sinh</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    {{-- <th scope="row">{{ 'US' . $user->id }}</th> --}}
                                                    <th scope="row" class="text-primary">{{ 'AD000' . $user->id }}</th>
                                                    <td>
                                                        <div>
                                                            <img src="{{ asset($user->avatar) ? '' . Storage::url($user->avatar) : $user->name }}"
                                                                alt="avatar" class="avatar-xs rounded-circle me-2">
                                                            {{ $user->name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($user->email)
                                                            <span>{{ $user->email }}</span>
                                                        @else
                                                            <span>Không có email</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user->phone_number)
                                                            <span>{{ $user->phone_number }}</span>
                                                        @else
                                                            <span>Không có số điện thoại</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user->date_of_birthday)
                                                            <span>{{ $format = date("d-m-Y",strtotime($user->date_of_birthday)) }}</span>
                                                        @else
                                                            <span>Không có ngày sinh</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($user && $user->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @elseif ($user && $user->status === 2)
                                                            <span class="badge bg-warning">Không hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Khóa</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Users_Edit', $user->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a>
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
                                <div class="mt-4">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
