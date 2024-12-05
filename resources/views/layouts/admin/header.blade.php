<header id="page-topbar" >
    <div class="navbar-header ">
        <div class="d-flex" >
            <!-- LOGO -->
            <div class="navbar-brand-box ">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('client/assets/images/564e4c03-437c-4c88-9a8d-2d8fcf267155-removebg-preview.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="{{route('route_BackEnd_Dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images/favicon.ico') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('client/assets/images/564e4c03-437c-4c88-9a8d-2d8fcf267155-removebg-preview.png') }}" alt="" height="100" width="100 ">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>

        <div class="d-flex" >
            
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('./huy/images-removebg-preview.png')}}"
                        alt="{{ Auth::user()->name }}">
                    @if (Auth::check())
                        <p>{{ Auth::user()->username }}</p>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a   href="{{route('admin.userInfo')}}" class="dropdown-item"
                      ><i
                            class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Thông tin cá nhân</a>
                    <div class="dropdown-divider"></div>
                    <a   href="{{route('admin.changePassword')}}" class="dropdown-item"
                      ><i
                            class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Thay đổi mật khẩu</a>
                    <div class="dropdown-divider"></div> 
                    <a class="dropdown-item text-danger" href="{{ route('logout-user') }}"><i
                            class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Đăng xuất</a>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline"></i>
                </button>
            </div> --}}

        </div>
    </div>
</header>
