@extends('layouts.admin.master')

@section('title', 'Danh sách khách hàng')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
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
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">Danh sách khách hàng</h4>

                                    @if(auth()->user()->role_id === 1)

                                    <a href="{{ route('route_BackEnd_Customers_Create') }}"
                                        class="btn btn-primary btn-sm">Thêm mới</a>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Quyền</th>
                                                <th scope="col">Trạng thái</th>
                                                @if(auth()->user()->role_id === 1)

                                                    <th scope="col">Hành động</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($customers as $customer)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'CU000' . $customer->id }}
                                                    </th>
                                                    <td>
                                                        <div>
                                                            <img src="{{ $customer->avatar ? '' . Storage::url($customer->avatar) : 'https://cellphones.com.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg' }}"
                                                                alt="avatar" class="avatar-xs rounded-circle me-2">
                                                            {{ $customer->username }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($customer->email)
                                                            <span>{{ $customer->email }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($customer->phone)
                                                            <span>{{ $customer->phone }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($customer && $customer->role_id === 1)
                                                            <span class="">Admin</span>
                                                        @elseif($customer && $customer->role_id === 2)
                                                            <span class="">Nhân viên</span>
                                                        @elseif($customer && $customer->role_id === 4)
                                                            <span class="">Nhân viên GH</span>
                                                        @else
                                                            <span class="">Khách hàng</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($customer && $customer->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @elseif ($customer && $customer->status === 2)
                                                            <span class="badge bg-warning">Không hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Khóa</span>
                                                        @endif
                                                    </td>
                                                    @if(auth()->user()->role_id === 1)
                                                        <td>
                                                            <div>
                                                            
                                                                @if($customer->status == 1)
                                                                    <a href="{{ route('route_BackEnd_Customers_Status', ['id' => $customer->id,'status' => $customer->status]) }}"
                                                                        class="btn btn-danger btn-sm"><i class="fa-solid fa-lock"></i></a>
                                                                @else
                                                                    
                                                                    <a href="{{ route('route_BackEnd_Customers_Status',['id' => $customer->id,'status' => $customer->status ]) }}"
                                                                            class="btn btn-success btn-sm"><i class="fa-solid fa-lock-open"></i></a>
                                                                @endif
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $customer->id }}" style="padding: 4px 8px !important;">
                                                                    <i class="fa-solid fa-user-edit"></i>
                                                                  </button>
                                                               
                                                                <a href="{{ route('route_BackEnd_Customers_Edit',['id' => $customer->id,'role_id' => $customer->role_id ]) }}"
                                                                    class="btn btn-primary btn-sm">Thay đổi mật khẩu</a>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>

                                                <div class="modal fade" id="exampleModal{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Cấp quyền tài khoản</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <form action="{{ route('permissions') }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="{{ $customer->id }}">
                                                                <select class="form-control" name="rold_id"">
                                                                    
                                                                    <option value="2" {{ $customer->role_id == 2 ? 'selected' :''  }}>Nhân viên</option>
                                                                    <option value="4" {{ $customer->role_id == 4 ? 'selected' :''  }}>Nhân viên GH</option>
                                                                    <option value="3" {{ $customer->role_id == 3 ? 'selected' :''  }}>Khách hàng</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                              <button type="submit" class="btn btn-success">Cấp quyền</button>
                                                            </div>
                                                        </form>
                                                     
                                                      </div>
                                                    </div>
                                                  </div>    
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan="12" style="color: red !important">Không có bản ghi</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $customers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
