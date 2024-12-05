<style>
    .fa-heart:before {
    color: crimson !important;
}
</style>

<header id="header" class="header style-02 header-dark header-transparent header-sticky" style="background-color: #fff">
    <div class="header-wrap-stick">
        <div class="header-position p-0">
            <div class="header-middle">
                <div class="akasha-menu-wapper"></div>
                <div class="header-middle-inner">
                    <div class="header-search-menu">
                        <div class="block-menu-bar">
                            <a class="menu-bar menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div class="header-logo-nav">
                        <div class="header-logo">
                            <a href="/"><img alt="Akasha"
                                    src="{{ asset('client/assets/images/564e4c03-437c-4c88-9a8d-2d8fcf267155-removebg-preview.png') }}"
                                    class="" style="width:100px;"></a>
                        </div>
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu akasha-clone-mobile-menu akasha-nav main-menu">
                                <li id="menu-item-230"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Home" href="/">Trang chủ</a>
                                </li>
                                <li id="menu-item-228"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title position-relative" title="Shop"
                                        href="{{ route('route_FrontEnd_Product') }}">Sản phẩm</a>
                                       

                                </li>
                                <li id="menu-item-229"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Elements"
                                        href="{{ route('route_FrontEnd_News') }}">Bài viết</a>
                                </li>
                                <li id="menu-item-996"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-996 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Blog"
                                        href="{{ route('route_FrontEnd_Contact') }}">Về chúng tôi</a>
                                </li>
                                <li id="menu-item-237"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-237 parent">
                                    <a class="akasha-menu-item-title" title="Pages"
                                        href="{{ route('route_FrontEnd_Contact_phone') }}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="header-control">
                        <div class="header-control-inner">
                            <div class="meta-dreaming">
                                <div class="header-search akasha-dropdown">
                                    
                                    <form action="{{ route('route_FrontEnd_Home') }}" role="search" method="get">
                                        <div class="d-flex " 
                                        style="padding:5px 20px; border:1px solid #cdcdcd; border-radius:5px;">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $name }}"
                                                style="border:none;"
                                                placeholder="Tìm kiếm sản phẩm">
                                            <button class="ml-3" style="padding:0px 20px; border-radius:5px; background:#C92127 !important;">
                                                <span class="flaticon-magnifying-glass-1" style="font-size:14px; !important;"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="akasha-dropdown-close">x</div>
                                @if (auth()->user())
                                <div class="block-minicart block-dreaming akasha-mini-cart ">
                                    <div class="block-cart-link">
                                        <a class="block-link" href="{{ route('route_FrontEnd_Cart_Like') }}">
                                            <i class="fa-solid fa-heart"></i>
                                            <span class="count_like">
                                                @php
                                                    $cart_like = session('cart_like');
                                                @endphp
                                                @if (isset($cart_like) && is_array($cart_like))
                                                    {{ $numberOfItemsInCartLike }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="block-minicart block-dreaming akasha-mini-cart pr-2">
                                    <div class="block-cart-link">
                                        <a class="block-link block-link-1" href="{{ route('route_FrontEnd_Cart') }}">
                                            <span class="flaticon-bag"></span>
                                            <span class="count">
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    {{ $numberOfItemsInCart }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                </div>

                              
                            @endif
                                <div class="menu-item block-user block-dreaming akasha-dropdown">
                                    @if (Auth::check())
                                        @if (Auth::user()->lastName)
                                            <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                                src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png' }}"
                                                alt="{{ Auth::user()->name }}">
                                        @else
                                            <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                                src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png' }}"
                                                alt="{{ Auth::user()->name }}">
                                        @endif
                                    @else
                                        <a class="block-link d-flex align-items-center" href="#">
                                            <span class="flaticon-profile"></span>
                                        </a>
                                    @endif

                                    <ul class="sub-menu " style="width:200px;">
                                        @if (!Auth::check())
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                                <a href="{{ route('route_FrontEnd_Login') }}">Đăng nhập</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                                <a href="{{ route('getRegister') }}">Đăng ký</a>
                                            </li>
                                        @endif
                                        @if (Auth::check())
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                                <a href="{{ route('user.userOrder', ['id' => auth()->user()->id]) }}">Đơn
                                                    hàng của tôi</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                                <a href="{{ route('user.userInfo', ['id' => auth()->user()->id]) }}">Quản
                                                    lí thông tin</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                                <a href="{{ route('user.changePassword') }}">Thay đổi mật khẩu</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                                <a href="{{ route('logout-user') }}">Đăng xuất</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header-search akasha-dropdown">
                <div class="header-search-inner" data-akasha="akasha-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="flaticon-magnifying-glass-1"></span>
                    </a>
                </div>
                <div class="block-search">
                    <form action="{{ route('route_FrontEnd_Home') }}" role="search" method="get"
                        class="form-search block-search-form akasha-live-search-form">
                        @csrf
                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="off" class="searchfield txt-livesearch input" name="name"
                                    value="{{ $name }}" placeholder="Nhập tên sản phẩm..." type="text">
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">
                            <span class="flaticon-magnifying-glass-1"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
        </div>
        <div class="header-mobile-mid">
            <div class="header-logo">
                <a href="index.html"><img alt="Akasha"
                        src="{{ asset('client/assets/images/564e4c03-437c-4c88-9a8d-2d8fcf267155-removebg-preview.png') }}"
                        class="logo"></a>
            </div>
        </div>
        <div class="header-mobile-right">
            <div class="header-control-inner">
                <div class="meta-dreaming">
                    <div class="menu-item block-user block-dreaming akasha-dropdown">
                        @if (Auth::check())
                            @if (Auth::user()->lastName)
                                <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                    src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                    src="{{ asset(Auth::user()->avatar) ? '' . Storage::url(Auth::user()->avatar) : Auth::user()->name }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                        @else
                            <a class="block-link" href="#">
                                <span class="flaticon-profile"></span>
                            </a>
                        @endif

                        <ul class="sub-menu">
                            @if (!Auth::check())
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                    <a href="{{ route('route_FrontEnd_Login') }}">Đăng nhập</a>
                                </li>
                            @endif
                            <li
                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                <a href="{{ route('logout-user') }}">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-minicart block-dreaming akasha-mini-cart akasha-dropdown">
                        <div class="shopcart-dropdown block-cart-link" data-akasha="akasha-dropdown">
                            <a class="block-link" href="{{ route('route_FrontEnd_Cart') }}">
                                <span class="flaticon-bag"></span>
                                <span class="count">
                                    @php
                                        $cart = session('cart');
                                    @endphp
                                    @if (isset($cart) && is_array($cart))
                                        {{ $numberOfItemsInCart }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
