<div class="hidden-md hidden-lg opacity_menu"></div>
    <div class="opacity_filter"></div>
    <header class="header">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 d-list col-xs-12 a-right topbar_right">
                        <div class="list-inline a-center f-right">
                            <ul>
                                <li>
                                    <i class="fa fa-user"></i>
                                    <a href="index5502.html?route=account/register" title="Đăng ký" class="account_a">
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-lock"></i>
                                    <a href="indexe223.html?route=account/login" title="Đăng nhập" class="account_a">
                                        <span>Đăng nhập</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                                    <a href="index.html" class="logo-wrapper ">
                                        <img src="frontend/image/catalog/logo/logo.png" alt="Bigboom">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 no-padding col-sm-12 col-xs-12">
                                <div class="header-left">
                                    <div class="header_search header_searchs">
                                        <form class="input-group search-bar" role="search" id="search">
                                            <div class="collection-selector">
                                                <select name="category_id" class="search_text">
                                                    <option class="item-cate search_item" value="0">Tất cả</option>
                                                    @foreach ($fatories as $factory)
                                                    <option class="item-cate search_item" value="171">
                                                        {{ $factory->name }}&nbsp;&nbsp;
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="search" name="search" value="" placeholder="Tìm kiếm"
                                                class="input-group-field st-default-search-input search-text"
                                                autocomplete="off">
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
                                            <a class="phone-order" href="tel:0123456789">0123456789</a>
                                        </div>
                                        <div class="top-cart-contain f-right hidden-xs hidden-sm visible-md visible-lg">
                                            <div class="mini-cart text-xs-center" id="cart">
                                                <div class="heading-cart">
                                                    <a class="bg_cart" href="index630e.html?route=checkout/cart"
                                                        title="Giỏ hàng">
                                                        <span class="absolute count_item count_item_pr">0</span>
                                                        <i class="fa fa-shopping-bag"></i>
                                                        <span class="block-small-cart">
                                                            <span class="text-giohang hidden-xs">Giỏ hàng</span>
                                                            <span class="block-count-pr">
                                                                <span
                                                                    class="count_item count_item_pr price_cart">0đ</span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="top-cart-content">
                                                    <ul id="cart-sidebar" class="mini-products-list count_li">
                                                        <li>
                                                            <div class="no-item">
                                                                <p>Giỏ hàng của bạn trống!</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="top-cart-contain f-right hidden-lg hidden-md visible-xs visible-sm">
                                            <div class="mini-cart text-xs-center">
                                                <div class="heading-cart">
                                                    <a class="bg_cart" href="index630e.html?route=checkout/cart"
                                                        title="Giỏ hàng">
                                                        <span class="absolute count_item count_item_pr">0</span>
                                                        <img alt="Giỏ hàng"
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
                                                <a class="link-lv1" href="balo-va-tui-xach.html" title="Balo và túi xách">
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
                                                    <a href="{{ route('fe.information.detail', ['slug'=>str_slug($inf->title), 'id'=>$inf->id]) }}">
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
                                            <a class="a-img" href="lien-he.html">
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
