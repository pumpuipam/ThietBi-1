<div class="vertical-menu" style="background-color:white !important;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                @if (Auth::check())

                        <li class="menu-title">Trang chủ</li>

                        
                        <li>

                            <a href="{{ route('route_BackEnd_Dashboard') }}" class="waves-effect">
                                <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        @if(auth()->user()->role_id != 4)
                         <li class="menu-title">Bán hàng</li>

                        {{-- <li>
                            <a href="{{ route('pos.index') }}" class="waves-effect">
                                <i class="ti-archive"></i>
                                <span>Bán hàng</span>
                            </a>
                           
                        </li> --}}

                        <li class="menu-title">Người dùng</li>

                        <li>
                            <a href="{{ route('route_BackEnd_Customers_List') }}" class="waves-effect">
                                <i class="fas fa-user-md"></i>
                                <span>Khách hàng</span>
                            </a>
                            
                        </li>
                       
                     
                        <li class="menu-title">QUẢN LÝ KHO SẢN PHẨM</li>
                        <li>
                            <a href="{{ route('route_BackEnd_Suppliers_List') }}" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span>Nhà cung cấp</span>
                            </a>
                           
                        </li>

                        <li>
                            <a href="{{ route('inventory.index') }}" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span>Nhập kho</span>
                            </a>
                           
                        </li>
                        <li>
                            <a href="{{ route('inventory_export.index') }}" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span>Xuất kho</span>
                            </a>
                           
                        </li>

                        <li class="menu-title">Sản phẩm</li>

                        <li>
                            <a href="{{ route('route_BackEnd_Products_List') }}" class="waves-effect">
                                <i class="fab fa-shopify"></i>
                                <span>Sản phẩm</span>
                            </a>
                          
                        </li>
                        @if(auth()->user()->role_id === 1)

                            <li>
                                <a href="{{ route('route_BackEnd_Category_Product_List') }}" class="waves-effect">
                                    <i class="fas fa-space-shuttle"></i>
                                    <span>Nhóm sản phẩm</span>
                                </a>
                            
                            
                            </li>

                            <li>
                                <a href="{{ route('route_BackEnd_Type_Product_List') }}" class="waves-effect">
                                    <i class="fas fa-space-shuttle"></i>
                                    <span>Thể loại</span>
                                </a>
                            
                            </li>
                            
                            {{-- <li>
                                <a href="{{ route('promotion.index') }}" class="waves-effect">
                                    <i class="fas fa-space-shuttle"></i>
                                    <span>Khuyến mãi</span>
                                </a>
                            
                            </li> --}}
                        @endif
                        <li>
                            <a href="{{ route('rateYo.index') }}" class="waves-effect">
                                <i class="fas fa-space-shuttle"></i>
                                <span>Bình luận sản phẩm</span>
                            </a>
                           
                           
                        </li>
                        
                        @endif

                        <li class="menu-title">Đơn hàng</li>
                       

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-shopping"></i>
                                <span>Đơn hàng</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Orders_List') }}">Danh sách đơn hàng</a></li>
                            </ul>
                        </li>
                        @if(auth()->user()->role_id != 4)

                            {{-- <li>
                                <a href="{{ route('address.index') }}" class="waves-effect">
                                    <i class="fas fa-space-shuttle"></i>
                                    <span>Địa chỉ giao hàng</span>
                                </a>
                            
                            
                            </li> --}}
                        {{-- @if(auth()->user()->role_id != 4) --}}

                            <li class="menu-title">Tin tức</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-archive"></i>
                                    <span>Bài viết</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('route_BackEnd_News_List') }}">Danh sách bài viết</a></li>
                                    <li><a href="{{ route('route_BackEnd_News_Create') }}">Tạo mới</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-archive"></i>
                                    <span>Danh mục bài viết</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('route_BackEnd_Category_News_List') }}">Danh mục bài viết</a>
                                    </li>
                                    <li><a href="{{ route('route_BackEnd_Category_News_Create') }}">Tạo mới</a></li>
                                </ul>
                            </li>
                            
                        
                            @if(auth()->user()->role_id === 1)
                            <li class="menu-title">Thống kê</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-message"></i>
                                    <span>Báo cáo thống kê</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('statistic.index') }}">Doanh thu</a></li>
                                </ul>
                            
                            </li>
                            @endif
                        @endif 
               
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
