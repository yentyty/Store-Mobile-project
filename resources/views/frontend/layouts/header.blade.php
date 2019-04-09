<div class="hidden-md hidden-lg opacity_menu"></div>
    <div class="opacity_filter"></div>
    <header class="header">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    </div>
                    @if(Auth::user())
                    <div class="col-md-6 col-sm-6 d-list col-xs-12 a-right topbar_right">
                        <div class="list-inline a-center f-right">
                            <ul>
                                <li>
                                    <i class="fa fa-user"></i>
                                    <a  title="Đăng ký" class="account_a">
                                        <span>Xin chào: {{ Auth::user()->name }}</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <a href="{{ route('fe.register.editregister') }}" title="Đăng ký" class="account_a">
                                        <span>Sửa TT Cá Nhân</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    <a href="{{ route('fe.postLogout') }}" title="Đăng xuất" class="account_a">
                                        <span>Đăng Xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="col-md-6 col-sm-6 d-list col-xs-12 a-right topbar_right">
                        <div class="list-inline a-center f-right">
                            <ul>
                                <li>
                                    <i class="fa fa-user"></i>
                                    <a href="{{ route('fe.register.getregister') }}" title="Đăng ký" class="account_a">
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-lock"></i>
                                    <a href="{{ route('fe.login') }}" title="Đăng nhập" class="account_a">
                                        <span>Đăng nhập</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mid-header">
            <div class="container">
                <div class="row">
                    <div class="content_header">
                        <div class="header-main">
                            <div class="menu-bar-h nav-mobile-button hidden-md hidden-lg">
                                <a href="#nav-mobile">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="{{ route('fe.home.index') }}" class="logo-wrapper ">
                                        <img src="frontend/image/catalog/logo/logo.png" alt="Bigboom">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 no-padding col-sm-12 col-xs-12">
                                <div class="header-left">
                                    <div class="header_search header_searchs">
                                        <form class="input-group search-bar" role="search" id="search">
                                            <input type="search" name="search" value="" placeholder="Tìm kiếm"
                                                class="input-group-field st-default-search-input search-text"
                                                autocomplete="off" style="padding-left: 1em;">
                                            <span class="input-group-btn">
                                                <button class="btn icon-fallback-text">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="header-right">
                                    <div class="header-acount hidden-lg-down">
                                        <div class="wishlist_header hidden-xs hidden-sm">
                                            <div class="img_hotline"><i class="fa fa-phone"></i></div>
                                            <span class="text_hotline">Điện thoại</span>
                                            @foreach ($introducesAll as $intro)
                                            <a class="phone-order">{{ $intro->phone }}</a>
                                            @endforeach
                                        </div>
                                        <div class="top-cart-contain f-right hidden-xs hidden-sm visible-md visible-lg">
                                            <div class="mini-cart text-xs-center" id="cart">
                                                <div class="heading-cart">
                                                    <a class="bg_cart" href="{{ route('fe.cart.checkout') }}"
                                                        title="Giỏ hàng">
                                                        <span class="absolute count_item count_item_pr">{{ Cart::getContent()->count() }}</span>
                                                        <i class="fa fa-shopping-bag"></i>
                                                        <span class="block-small-cart">
                                                            <span class="text-giohang hidden-xs">Giỏ hàng</span>
                                                            <span class="block-count-pr">
                                                                <span
                                                                    class="count_item count_item_pr price_cart">{{ number_format(Cart::getSubTotal(),0 ,',', '.') }}đ</span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="top-cart-content" style="width:45em;">
                                                    <ul id="cart-sidebar" class="mini-products-list count_li">
                                                        @php $count = Cart::getContent()->count() @endphp
                                                        @if ( $count <= 0)
                                                            <li>
                                                                <div class="no-item">
                                                                    <p>Giỏ hàng của bạn trống!</p>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <div class="pd right_ct">
                                                                    <span class="price" style="color:#F34111;">Giỏ hàng</span>
                                                                </div>
                                                            </li>
                                                            @foreach ($cart as $item)
                                                                <li>
                                                                    <div class="no-item">
                                                                        <div class="top-subtotal">{{ $item->name }}
                                                                            <span class="price" style="color:black!important;">{{ number_format($item->price*$item->quantity,0 ,',', '.') }}đ</span>
                                                                            <span class="price" style="color:black!important; font-weight:normal!important; padding-right:3em;">{{ number_format($item->price, 0,',', '.') }}đ x {{ $item->quantity }}</span>
                                                                            <span class="price" style="color:black!important; font-weight:normal!important; padding-right:3em; text-transform:lowercase;">{{ $item->attributes->color }}</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                            <li>
                                                                <div class="pd">
                                                                    <div class="top-subtotal" style="font-weight:bold; color:#F34111;">Tổng tiền:
                                                                        <span class="price">{{ number_format($subtotal,0 ,',', '.') }}đ</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="pd right_ct">
                                                                    <a href="{{ route('fe.cart.checkout') }}" class="btn btn-primary">
                                                                        <span>Giỏ hàng</span>
                                                                    </a>
                                                                    <a href="{{ route('fe.cart.pay') }}" class="btn btn-white">
                                                                        <span>Thanh toán</span>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="top-cart-contain f-right hidden-lg hidden-md visible-xs visible-sm">
                                            <div class="mini-cart text-xs-center">
                                                <div class="heading-cart">
                                                    <a class="bg_cart" href="{{ route('fe.cart.checkout') }}"
                                                        title="Giỏ hàng">
                                                        <span class="absolute count_item count_item_pr">{{ Cart::getContent()->count() }}</span>
                                                        <img
                                                            alt="Giỏ hàng"
                                                            src="frontend/catalog/view/theme/bigboom/image/icon-bag.png" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container ">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12 vertical-menu-home">
                        <div id="section-verticalmenu"
                            class="block block-verticalmenu float-vertical float-vertical-left">
                            <div class="bg-vertical"></div>
                            <h4 class="block-title float-vertical-button">
                                <span class="verticalMenu-toggle"></span>
                                <span class="verticalMenu-text">Danh mục</span>
                            </h4>
                            <div class="block_content">
                                <div id="verticalmenu" class="verticalmenu" role="navigation">
                                    <ul class="nav navbar-nav nav-verticalmenu">
                                        @foreach ($fatories as $factory)
                                            <li class="vermenu-option-11 ">
                                                <a class="link-lv1" href="{{ route('fe.factory.postfactory', ['id'=>$factory->id, 'slug'=>$factory->slug]) }}" title="Balo và túi xách">
                                                    <span class="menu-icon">
                                                        <span class="menu-title">{{ $factory->name }}</span>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 bg-header-nav hidden-xs hidden-sm">
                        <div class="relative">
                            <div class="row row-noGutter-2">
                                <nav class="header-nav">
                                    <ul class="item_big">
                                        <li class="nav-item ">
                                            <a class="a-img" href="{{ route('fe.home.index') }}">
                                                <span>Trang chủ</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="a-img">
                                                <span>Thông tin</span>
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="item_small hidden-md hidden-sm hidden-xs">
                                                @foreach ($informations as $inf)
                                                <li>
                                                    <a href="{{ route('fe.information.detail', ['slug'=>$inf->slug, 'id'=>$inf->id]) }}">
                                                        <span>{{ $inf->title }}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="a-img" href="{{ asset('/product-new') }}">
                                                <span>Hàng mới</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="a-img" href="{{ asset('/news') }}">
                                                <span>Tin tức</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="a-img" href="{{ route('fe.contact.index') }}">
                                                <span>Liên hệ</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
