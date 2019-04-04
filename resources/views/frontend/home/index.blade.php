@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="section-ss-banner col-md-push-3 col-md-9 col-sm-12 col-xs-12 no-padding" style="margin-top:1.5em;">
            <div class="section-ss col-md-12 col-sm-12 col-xs-12">
                <link rel="stylesheet" href="frontend/catalog/view/javascript/bxslider/jquery.bxslider.min.css">
                <script src="frontend/catalog/view/javascript/bxslider/jquery.bxslider.min.js"></script>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($banners as $bn)
                            <li data-target="#myCarousel" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                <div class="carousel-inner">
                    @foreach($banners as $bn)
                        <div class="item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block img-fluid" src="uploads/images/banners/{{ $bn->image }}" alt="{{ $bn->title }}" style="width:100%; ">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                <div class="col-md-12 no-padding col-sm-12 hidden-xs">
                    @foreach ($offers as $offer)
                        <div class="banner-item banner-right col-md-6 col-sm-6 col-xs-12 "
                            id="banner_default-2087737797">
                            <a href="javascript:void(0)" title="">
                                <img class="img-responsive" src="uploads/images/offers/{{ $offer->image }}"
                                    alt="">
                                <div class="hover_collection"></div>
                            </a>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <div class="row">
                <section class="awe-section-3 " id="category_custom-1">
                    <section class="section_like_product">
                        <div class="container">
                            <div class="row row-noGutter-2">
                                <div class="heading tab_link_module">
                                    <h2 class="title-head pull-left">
                                        <span>Tiêu biểu</span>
                                    </h2>
                                    <div class="tabs-container tab_border pull-right">
                                        <span class="hidden-md hidden-lg button_show_tab">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                        <span class="hidden-md hidden-lg title_check_tabs"></span>
                                        <div class="clearfix">
                                            <ul class="ul_link link_tab_check_click">
                                                <li class="li_tab">
                                                    <a href="#content-tabb10" class="head-tabs head-tab10"
                                                        data-src=".head-tab10">Kính mắt thời trang</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb11" class="head-tabs head-tab11"
                                                        data-src=".head-tab11">Thời trang nam</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb12" class="head-tabs head-tab12"
                                                        data-src=".head-tab12">Thời trang nữ</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb13" class="head-tabs head-tab13"
                                                        data-src=".head-tab13">Đồ trang sức</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb14" class="head-tabs head-tab14"
                                                        data-src=".head-tab14">Đồng hồ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="tabs-content tabs-content-featured col-md-12 col-sm-12 col-xs-12 no-padding">
                                        <div id="content-tabb10" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="kinh-mat-nam-nba-1150-a01.html"
                                                                    title="Kính Mát Nam NBA 1150 A01">
                                                                    <img src="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        alt="Kính Mát Nam NBA 1150 A01" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=220&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="kinh-mat-nam-nba-1150-a01.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="kinh-mat-nam-nba-1150-a01.html"
                                                                            title="Kính Mát Nam NBA 1150 A01">Kính
                                                                            Mát Nam NBA 1150 A01</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="5" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">1,170,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                                <div class="clearfix hidden-sm hidden-md hidden-lg"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb11" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <span class="sale-off">-50%</span>
                                                                <a class="image_link display_flex"
                                                                    href="quan-jean-nam-mot-tre-phong-cach-sid23131.html"
                                                                    title="Quần jean nam Mốt Trẻ phong cách SID23131">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid23131-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid23131-228x228.jpg"
                                                                        alt="Quần jean nam Mốt Trẻ phong cách SID23131" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=207&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="quan-jean-nam-mot-tre-phong-cach-sid23131.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="quan-jean-nam-mot-tre-phong-cach-sid23131.html"
                                                                            title="Quần jean nam Mốt Trẻ phong cách SID23131">Quần
                                                                            jean nam Mốt Trẻ phong cách SID23131</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">299,000đ</span>
                                                                        <span
                                                                            class="price product-price-old">599,000đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                                <div class="clearfix hidden-sm hidden-md hidden-lg"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb12" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <span class="sale-off">-18%</span>
                                                                <a class="image_link display_flex"
                                                                    href="do-boi-nu-lien-manh-co-yem-khoet-nguc-sid64726.html"
                                                                    title="Đồ bơi nữ liền mãnh cổ yếm khoét ngực SID64726">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid64726-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid64726-228x228.jpg"
                                                                        alt="Đồ bơi nữ liền mãnh cổ yếm khoét ngực SID64726" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=212&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="do-boi-nu-lien-manh-co-yem-khoet-nguc-sid64726.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="do-boi-nu-lien-manh-co-yem-khoet-nguc-sid64726.html"
                                                                            title="Đồ bơi nữ liền mãnh cổ yếm khoét ngực SID64726">Đồ
                                                                            bơi nữ liền mãnh cổ yếm khoét ngực
                                                                            SID64726</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">299,000đ</span>
                                                                        <span
                                                                            class="price product-price-old">365,000đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                                <div class="clearfix hidden-sm hidden-md hidden-lg"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb13" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="giay-nu-top-fit-krypton-8009002-sid66157.html"
                                                                    title="Giày nữ Top Fit KRYPTON 8009002 SID66157">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid66157-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid66157-228x228.jpg"
                                                                        alt="Giày nữ Top Fit KRYPTON 8009002 SID66157" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=214&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="giay-nu-top-fit-krypton-8009002-sid66157.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="giay-nu-top-fit-krypton-8009002-sid66157.html"
                                                                            title="Giày nữ Top Fit KRYPTON 8009002 SID66157">Giày
                                                                            nữ Top Fit KRYPTON 8009002 SID66157</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">469,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-lg"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb14" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="dong-ho-diamond-d-dm38025ig.html"
                                                                    title="Đồng hồ diamond-d-DM38025IG">
                                                                    <img src="frontend/image/cache/catalog/san-pham/dong-ho-diamond-d-dm38025ig-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/dong-ho-diamond-d-dm38025ig-228x228.jpg"
                                                                        alt="Đồng hồ diamond-d-DM38025IG" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=216&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="dong-ho-diamond-d-dm38025ig.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="dong-ho-diamond-d-dm38025ig.html"
                                                                            title="Đồng hồ diamond-d-DM38025IG">Đồng
                                                                            hồ diamond-d-DM38025IG</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">13,750,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-sm hidden-md hidden-lg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <section class="awe-section-2">
                    <div class="sec_banner hidden-sm hidden-xs">
                        <div class="container">
                            <div class="row vc_row-flex">
                                <div class="vc_column_container col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="row vc_row-flex">
                                                <div class="banner-item banner-right col-md-6 col-sm-6 col-xs-12 "
                                                    id="banner_default-1792296879">
                                                    <a href="javascript:void(0)" title="">
                                                        <img class="img-responsive"
                                                            src="frontend/image/cache/catalog/banner/bg-top1-570x230.jpg"
                                                            alt="">
                                                        <div class="hover_collection"></div>
                                                    </a></div>
                                                <div class="banner-item banner-right col-md-6 col-sm-6 col-xs-12 "
                                                    id="banner_default-1358953868">
                                                    <a href="javascript:void(0)" title="">
                                                        <img class="img-responsive"
                                                            src="frontend/image/cache/catalog/banner/bg-top2-570x230.jpg"
                                                            alt="">
                                                        <div class="hover_collection"></div>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="awe-section-3 " id="category_by_category-2">
                    <section class="section_like_product">
                        <div class="container">
                            <div class="row row-noGutter-2">
                                <div class="heading tab_link_module">
                                    <h2 class="title-head pull-left">
                                        <span>Thời trang nam</span>
                                    </h2>
                                    <div class="tabs-container tab_border pull-right">
                                        <span class="hidden-md hidden-lg button_show_tab">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                        <span class="hidden-md hidden-lg title_check_tabs"></span>
                                        <div class="clearfix">
                                            <ul class="ul_link link_tab_check_click">
                                                <li class="li_tab">
                                                    <a href="#content-tabb20" class="head-tabs head-tab20"
                                                        data-src=".head-tab20">Áo nam</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb21" class="head-tabs head-tab21"
                                                        data-src=".head-tab21">Balo và túi nam</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb22" class="head-tabs head-tab22"
                                                        data-src=".head-tab22">Giày dép nam</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb23" class="head-tabs head-tab23"
                                                        data-src=".head-tab23">Phụ kiện nam</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb24" class="head-tabs head-tab24"
                                                        data-src=".head-tab24">Quần nam</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="tabs-content tabs-content-featured col-md-12 col-sm-12 col-xs-12 no-padding">
                                        <div id="content-tabb20" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <span class="sale-off">-50%</span>
                                                                <a class="image_link display_flex"
                                                                    href="quan-jean-nam-mot-tre-phong-cach-sid23131.html"
                                                                    title="Quần jean nam Mốt Trẻ phong cách SID23131">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid23131-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid23131-228x228.jpg"
                                                                        alt="Quần jean nam Mốt Trẻ phong cách SID23131" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=207&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="quan-jean-nam-mot-tre-phong-cach-sid23131.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="quan-jean-nam-mot-tre-phong-cach-sid23131.html"
                                                                            title="Quần jean nam Mốt Trẻ phong cách SID23131">Quần
                                                                            jean nam Mốt Trẻ phong cách SID23131</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">299,000đ</span>
                                                                        <span
                                                                            class="price product-price-old">599,000đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb21" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="quan-short-kaki-nam-nang-dong-sid33752.html"
                                                                    title="Quần short kaki nam năng động SID33752">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid33752-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid33752-228x228.jpg"
                                                                        alt="Quần short kaki nam năng động SID33752" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=208&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="quan-short-kaki-nam-nang-dong-sid33752.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="quan-short-kaki-nam-nang-dong-sid33752.html"
                                                                            title="Quần short kaki nam năng động SID33752">Quần
                                                                            short kaki nam năng động SID33752</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="1" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">350,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb22" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <span class="sale-off">-20%</span>
                                                                <a class="image_link display_flex"
                                                                    href="giay-tay-nam-sledgers-greg-sid55783.html"
                                                                    title="Giày tây nam SLEDGERS GREG SID55783">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid55783-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid55783-228x228.jpg"
                                                                        alt="Giày tây nam SLEDGERS GREG SID55783" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=192&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="giay-tay-nam-sledgers-greg-sid55783.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="giay-tay-nam-sledgers-greg-sid55783.html"
                                                                            title="Giày tây nam SLEDGERS GREG SID55783">Giày
                                                                            tây nam SLEDGERS GREG SID55783</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">1,990,000đ</span>
                                                                        <span
                                                                            class="price product-price-old">2,500,000đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb23" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="kinh-mat-nam-nba-1150-a01.html"
                                                                    title="Kính Mát Nam NBA 1150 A01">
                                                                    <img src="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        alt="Kính Mát Nam NBA 1150 A01" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=220&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="kinh-mat-nam-nba-1150-a01.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="kinh-mat-nam-nba-1150-a01.html"
                                                                            title="Kính Mát Nam NBA 1150 A01">Kính
                                                                            Mát Nam NBA 1150 A01</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="5" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">1,170,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb24" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="quan-short-kaki-nam-nang-dong-sid33752.html"
                                                                    title="Quần short kaki nam năng động SID33752">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid33752-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid33752-228x228.jpg"
                                                                        alt="Quần short kaki nam năng động SID33752" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=208&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="quan-short-kaki-nam-nang-dong-sid33752.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="quan-short-kaki-nam-nang-dong-sid33752.html"
                                                                            title="Quần short kaki nam năng động SID33752">Quần
                                                                            short kaki nam năng động SID33752</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="1" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">350,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <section class="awe-section-3 " id="category_by_category-3">
                    <section class="section_like_product">
                        <div class="container">
                            <div class="row row-noGutter-2">
                                <div class="heading tab_link_module">
                                    <h2 class="title-head pull-left">
                                        <span>Thời trang nữ</span>
                                    </h2>
                                    <div class="tabs-container tab_border pull-right">
                                        <span class="hidden-md hidden-lg button_show_tab">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                        <span class="hidden-md hidden-lg title_check_tabs"></span>
                                        <div class="clearfix">
                                            <ul class="ul_link link_tab_check_click">
                                                <li class="li_tab">
                                                    <a href="#content-tabb30" class="head-tabs head-tab30"
                                                        data-src=".head-tab30">Áo nữ</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb31" class="head-tabs head-tab31"
                                                        data-src=".head-tab31">Giày dép nữ</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb32" class="head-tabs head-tab32"
                                                        data-src=".head-tab32">Phụ kiện nữ</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb33" class="head-tabs head-tab33"
                                                        data-src=".head-tab33">Quần nữ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="tabs-content tabs-content-featured col-md-12 col-sm-12 col-xs-12 no-padding">
                                        <div id="content-tabb30" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="ao-t-shirt-ca-tinh-can-de-blanc-t1069-sid54612.html"
                                                                    title="Áo T.shirt cá tính Can De Blanc T1069 SID54612">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid54612-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid54612-228x228.jpg"
                                                                        alt="Áo T.shirt cá tính Can De Blanc T1069 SID54612" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=213&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="ao-t-shirt-ca-tinh-can-de-blanc-t1069-sid54612.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="ao-t-shirt-ca-tinh-can-de-blanc-t1069-sid54612.html"
                                                                            title="Áo T.shirt cá tính Can De Blanc T1069 SID54612">Áo
                                                                            T.shirt cá tính Can De Blanc T1069
                                                                            SID54612</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">350,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb31" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="giay-nu-top-fit-krypton-8009002-sid66157.html"
                                                                    title="Giày nữ Top Fit KRYPTON 8009002 SID66157">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid66157-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid66157-228x228.jpg"
                                                                        alt="Giày nữ Top Fit KRYPTON 8009002 SID66157" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=214&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="giay-nu-top-fit-krypton-8009002-sid66157.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="giay-nu-top-fit-krypton-8009002-sid66157.html"
                                                                            title="Giày nữ Top Fit KRYPTON 8009002 SID66157">Giày
                                                                            nữ Top Fit KRYPTON 8009002 SID66157</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">469,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb32" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="kinh-mat-nam-nba-1150-a01.html"
                                                                    title="Kính Mát Nam NBA 1150 A01">
                                                                    <img src="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        alt="Kính Mát Nam NBA 1150 A01" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=220&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="kinh-mat-nam-nba-1150-a01.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="kinh-mat-nam-nba-1150-a01.html"
                                                                            title="Kính Mát Nam NBA 1150 A01">Kính
                                                                            Mát Nam NBA 1150 A01</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="5" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">1,170,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb33" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="ao-t-shirt-ca-tinh-can-de-blanc-t1069-sid54612.html"
                                                                    title="Áo T.shirt cá tính Can De Blanc T1069 SID54612">
                                                                    <img src="frontend/image/cache/catalog/san-pham/sid54612-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/sid54612-228x228.jpg"
                                                                        alt="Áo T.shirt cá tính Can De Blanc T1069 SID54612" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=213&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="ao-t-shirt-ca-tinh-can-de-blanc-t1069-sid54612.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="ao-t-shirt-ca-tinh-can-de-blanc-t1069-sid54612.html"
                                                                            title="Áo T.shirt cá tính Can De Blanc T1069 SID54612">Áo
                                                                            T.shirt cá tính Can De Blanc T1069
                                                                            SID54612</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">350,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <section class="awe-section-3 " id="category_custom-4">
                    <section class="section_like_product">
                        <div class="container">
                            <div class="row row-noGutter-2">
                                <div class="heading tab_link_module">
                                    <h2 class="title-head pull-left">
                                        <span>Phụ kiện hot</span>
                                    </h2>
                                    <div class="tabs-container tab_border pull-right">
                                        <span class="hidden-md hidden-lg button_show_tab">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                        <span class="hidden-md hidden-lg title_check_tabs"></span>
                                        <div class="clearfix">
                                            <ul class="ul_link link_tab_check_click">
                                                <li class="li_tab">
                                                    <a href="#content-tabb40" class="head-tabs head-tab40"
                                                        data-src=".head-tab40">Đồ trang sức</a>
                                                </li>
                                                <li class="li_tab">
                                                    <a href="#content-tabb41" class="head-tabs head-tab41"
                                                        data-src=".head-tab41">Đồng hồ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="tabs-content tabs-content-featured col-md-12 col-sm-12 col-xs-12 no-padding">
                                        <div id="content-tabb40" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="kinh-mat-nam-nba-1150-a01.html"
                                                                    title="Kính Mát Nam NBA 1150 A01">
                                                                    <img src="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/a01-228x228.jpg"
                                                                        alt="Kính Mát Nam NBA 1150 A01" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=220&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="kinh-mat-nam-nba-1150-a01.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="kinh-mat-nam-nba-1150-a01.html"
                                                                            title="Kính Mát Nam NBA 1150 A01">Kính
                                                                            Mát Nam NBA 1150 A01</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="5" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-on-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">1,170,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                        <div id="content-tabb41" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                <a class="image_link display_flex"
                                                                    href="dong-ho-diamond-d-dm38025ig.html"
                                                                    title="Đồng hồ diamond-d-DM38025IG">
                                                                    <img src="frontend/image/cache/catalog/san-pham/dong-ho-diamond-d-dm38025ig-228x228.jpg"
                                                                        data-lazyload="frontend/image/cache/catalog/san-pham/dong-ho-diamond-d-dm38025ig-228x228.jpg"
                                                                        alt="Đồng hồ diamond-d-DM38025IG" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    <form class="variants form-nut-grid">
                                                                        <div>
                                                                            <button
                                                                                class="btn-cart button_wh_40 left-to"
                                                                                title="Mua ngay" type="button"
                                                                                onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=216&amp;redirect=true'">Mua
                                                                                ngay</button>
                                                                            <!--onclick="cart.add(, 1)"></button>-->
                                                                            <a title="Xem"
                                                                                href="dong-ho-diamond-d-dm38025ig.html"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span
                                                                                    class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="dong-ho-diamond-d-dm38025ig.html"
                                                                            title="Đồng hồ diamond-d-DM38025IG">Đồng
                                                                            hồ diamond-d-DM38025IG</a>
                                                                    </h3>
                                                                    <div class="reviews-product-grid">
                                                                        <div class="zozoweb-product-reviews-badge">
                                                                            <div class="zozoweb-product-reviews-star"
                                                                                data-score="0" data-number="5"
                                                                                style="color: rgb(255, 190, 0);">
                                                                                <i data-alt="1"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="2"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="3"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="4"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                                <i data-alt="5"
                                                                                    class="star-off-png"></i>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box clearfix">
                                                                        <span
                                                                            class="price product-price">13,750,000đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12">
    <div class="row">
        <section class="awe-section-2">
            <div class="sec_banner hidden-sm hidden-xs">
                <div class="container">
                    <div class="row vc_row-flex">
                        <div class="vc_column_container col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="row vc_row-flex">
                                        <div class="banner-item banner-right col-md-6 col-sm-6 col-xs-12 "
                                            id="banner_default-744040239">
                                            <a href="javascript:void(0)" title="">
                                                <img class="img-responsive"
                                                    src="frontend/image/cache/catalog/banner/bg-banner-bottom-3-570x230.jpg"
                                                    alt="">
                                                <div class="hover_collection"></div>
                                            </a></div>
                                        <div class="banner-item banner-right col-md-6 col-sm-6 col-xs-12 "
                                            id="banner_default-793718588">
                                            <a href="javascript:void(0)" title="">
                                                <img class="img-responsive"
                                                    src="frontend/image/cache/catalog/banner/bg-banner-bottom-4-570x230.jpg"
                                                    alt="">
                                                <div class="hover_collection"></div>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="awe-section-8 " id="product_by_category-0">
            <section class="section_mblike">
                <div class="container">
                    <div class="row row-noGutter-2">
                        <div class="bg-mblike label-mblike">
                            <div class="heading">
                                <h2 class="title-head">
                                    <a href="thoi-trang-nu.html">Thời trang nữ</a>
                                </h2>
                            </div>
                            <div class="border_wrap">
                                <div class="owl_product_comback ">
                                    <div class="product_comeback_wrap">
                                        <div class="owl_product_item_content  not-dot not-nav3 not-nav"
                                            data-dot="false" data-nav="false" data-margin="30" data-lg-items="6"
                                            data-md-items="4" data-sm-items="3" data-xs-items="2">
                                            <div class="item saler_item padding-small col-md-2 col-sm-4 col-xs-6">
                                                <div class="owl_item_product product-col">
                                                    <div class="product-box">
                                                        <div class="product-thumbnail">
                                                            <a class="image_link display_flex"
                                                                href="kinh-mat-nam-nba-1150-a01.html"
                                                                title="Kính Mát Nam NBA 1150 A01">
                                                                <img src="frontend/image/cache/catalog/san-pham/a01-248x248.jpg"
                                                                    data-lazyload="frontend/image/cache/catalog/san-pham/a01-248x248.jpg"
                                                                    alt="Kính Mát Nam NBA 1150 A01" />
                                                            </a>
                                                            <div class="product-action-grid clearfix">
                                                                <form class="variants form-nut-grid">
                                                                    <div>
                                                                        <button
                                                                            class="btn-cart button_wh_40 left-to"
                                                                            title="Mua ngay" type="button"
                                                                            onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=220&amp;redirect=true'">Mua
                                                                            ngay</button>
                                                                        <!--onclick="cart.add(, 1)"></button>-->
                                                                        <a title="Xem"
                                                                            href="kinh-mat-nam-nba-1150-a01.html"
                                                                            class="button_wh_40 btn_view right-to quick-view">
                                                                            <i class="fa fa-eye"></i>
                                                                            <span class="style-tooltip">Xem</span>
                                                                        </a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="product-info effect a-left">
                                                            <div class="info_hhh">
                                                                <h3 class="product-name ">
                                                                    <a href="kinh-mat-nam-nba-1150-a01.html"
                                                                        title="Kính Mát Nam NBA 1150 A01">Kính Mát
                                                                        Nam NBA 1150 A01</a>
                                                                </h3>
                                                                <div class="reviews-product-grid">
                                                                    <div class="zozoweb-product-reviews-badge">
                                                                        <div class="zozoweb-product-reviews-star"
                                                                            data-score="5" data-number="5"
                                                                            style="color: rgb(255, 190, 0);">
                                                                            <i data-alt="1"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="2"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="3"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="4"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="5"
                                                                                class="star-on-png"></i>&nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box clearfix">
                                                                    <span
                                                                        class="price product-price">1,170,000đ</span>
                                                                    <span class="price product-price-old"
                                                                        style="text-decoration: none">&nbsp;</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item saler_item padding-small col-md-2 col-sm-4 col-xs-6">
                                                <div class="owl_item_product product-col">
                                                    <div class="product-box">
                                                        <div class="product-thumbnail">
                                                            <a class="image_link display_flex"
                                                                href="kinh-mat-nam-goldsun-gs217003-s1.html"
                                                                title="Kính Mát Nam GOLDSUN GS217003 S1 ">
                                                                <img src="frontend/image/cache/catalog/san-pham/gs217003-248x248.jpg"
                                                                    data-lazyload="frontend/image/cache/catalog/san-pham/gs217003-248x248.jpg"
                                                                    alt="Kính Mát Nam GOLDSUN GS217003 S1 " />
                                                            </a>
                                                            <div class="product-action-grid clearfix">
                                                                <form class="variants form-nut-grid">
                                                                    <div>
                                                                        <button
                                                                            class="btn-cart button_wh_40 left-to"
                                                                            title="Mua ngay" type="button"
                                                                            onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=219&amp;redirect=true'">Mua
                                                                            ngay</button>
                                                                        <!--onclick="cart.add(, 1)"></button>-->
                                                                        <a title="Xem"
                                                                            href="kinh-mat-nam-goldsun-gs217003-s1.html"
                                                                            class="button_wh_40 btn_view right-to quick-view">
                                                                            <i class="fa fa-eye"></i>
                                                                            <span class="style-tooltip">Xem</span>
                                                                        </a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="product-info effect a-left">
                                                            <div class="info_hhh">
                                                                <h3 class="product-name ">
                                                                    <a href="kinh-mat-nam-goldsun-gs217003-s1.html"
                                                                        title="Kính Mát Nam GOLDSUN GS217003 S1 ">Kính
                                                                        Mát Nam GOLDSUN GS217003 S1 </a>
                                                                </h3>
                                                                <div class="reviews-product-grid">
                                                                    <div class="zozoweb-product-reviews-badge">
                                                                        <div class="zozoweb-product-reviews-star"
                                                                            data-score="5" data-number="5"
                                                                            style="color: rgb(255, 190, 0);">
                                                                            <i data-alt="1"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="2"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="3"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="4"
                                                                                class="star-on-png"></i>&nbsp;
                                                                            <i data-alt="5"
                                                                                class="star-on-png"></i>&nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box clearfix">
                                                                    <span
                                                                        class="price product-price">660,000đ</span>
                                                                    <span class="price product-price-old"
                                                                        style="text-decoration: none">&nbsp;</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item saler_item padding-small col-md-2 col-sm-4 col-xs-6">
                                                <div class="owl_item_product product-col">
                                                    <div class="product-box">
                                                        <div class="product-thumbnail">
                                                            <a class="image_link display_flex"
                                                                href="dong-ho-bruno-sohnle.html"
                                                                title="Đồng hồ bruno-sohnle">
                                                                <img src="frontend/image/cache/catalog/san-pham/dong-ho-bruno-sohnle-248x248.png"
                                                                    data-lazyload="frontend/image/cache/catalog/san-pham/dong-ho-bruno-sohnle-248x248.png"
                                                                    alt="Đồng hồ bruno-sohnle" />
                                                            </a>
                                                            <div class="product-action-grid clearfix">
                                                                <form class="variants form-nut-grid">
                                                                    <div>
                                                                        <button
                                                                            class="btn-cart button_wh_40 left-to"
                                                                            title="Mua ngay" type="button"
                                                                            onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=215&amp;redirect=true'">Mua
                                                                            ngay</button>
                                                                        <!--onclick="cart.add(, 1)"></button>-->
                                                                        <a title="Xem"
                                                                            href="dong-ho-bruno-sohnle.html"
                                                                            class="button_wh_40 btn_view right-to quick-view">
                                                                            <i class="fa fa-eye"></i>
                                                                            <span class="style-tooltip">Xem</span>
                                                                        </a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="product-info effect a-left">
                                                            <div class="info_hhh">
                                                                <h3 class="product-name ">
                                                                    <a href="dong-ho-bruno-sohnle.html"
                                                                        title="Đồng hồ bruno-sohnle">Đồng hồ
                                                                        bruno-sohnle</a>
                                                                </h3>
                                                                <div class="reviews-product-grid">
                                                                    <div class="zozoweb-product-reviews-badge">
                                                                        <div class="zozoweb-product-reviews-star"
                                                                            data-score="0" data-number="5"
                                                                            style="color: rgb(255, 190, 0);">
                                                                            <i data-alt="1"
                                                                                class="star-off-png"></i>&nbsp;
                                                                            <i data-alt="2"
                                                                                class="star-off-png"></i>&nbsp;
                                                                            <i data-alt="3"
                                                                                class="star-off-png"></i>&nbsp;
                                                                            <i data-alt="4"
                                                                                class="star-off-png"></i>&nbsp;
                                                                            <i data-alt="5"
                                                                                class="star-off-png"></i>&nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box clearfix">
                                                                    <span
                                                                        class="price product-price">12,500,000đ</span>
                                                                    <span class="price product-price-old"
                                                                        style="text-decoration: none">&nbsp;</span>
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
                    </div>
                </div>
            </section>
        </section>
        <section class="awe-section-9 " id="news_by_category-0">
            <div class="section_bloggg hidden_blog">
                <div class="aside-title heading">
                    <h2 class="title-head">
                        <span>
                            <a href="javascript:void(0)">Tin mới nhất</a>
                        </span>
                    </h2>
                </div>
                <div class="container">
                    <div class="news_hot_left">
                        <div class="row">
                            <div class="content-blog-index col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                <div class="wrap_owl_blog" data-height="true" data-dot="false" data-nav="true"
                                    data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="1">
                                    <div class="blog_items col-md-3 col-sm-6 col-xs-12">
                                        <div class="myblog"
                                            onclick="window.location.href='mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html';">
                                            <div class="image-blog-left">
                                                <a href="mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html">
                                                    <picture>
                                                        <source media="(max-width: 375px)"
                                                            srcset="frontend/image/cache/catalog/tin-tuc/tintuc4-480x480.jpg">
                                                        <source media="(min-width: 376px) and (max-width: 767px)"
                                                            srcset="frontend/image/cache/catalog/tin-tuc/tintuc4-480x480.jpg">
                                                        <source media="(min-width: 768px) and (max-width: 1023px)"
                                                            srcset="frontend/image/cache/catalog/tin-tuc/tintuc4-480x480.jpg">
                                                        <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                            srcset="frontend/image/cache/catalog/tin-tuc/tintuc4-480x480.jpg">
                                                        <source media="(min-width: 1200px)"
                                                            srcset="frontend/image/cache/catalog/tin-tuc/tintuc4-480x480.jpg">
                                                        <img src="frontend/image/cache/catalog/tin-tuc/tintuc4-480x480.jpg"
                                                            title="Màu sắc nào sẽ thống trị làng mốt trong năm 2018?"
                                                            alt="Màu sắc nào sẽ thống trị làng mốt trong năm 2018?" />
                                                    </picture>
                                                    <div class="hover_collection"></div>
                                                </a>
                                            </div>
                                            <div class="content-right-blog">
                                                <div class="content_day_blog">
                                                    <span class="fix_left_blog">
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="news_home_content_short_time">15/06/2018</span>
                                                    </span>
                                                </div>
                                                <div class="title_blog_home">
                                                    <h3>
                                                        <a href="mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html"
                                                            title="">Màu sắc nào sẽ thống trị làng mốt trong năm
                                                            2018?</a>
                                                    </h3>
                                                </div>
                                                <p class=" text2line blog-item-summary">
                                                    Nhóm làm việc tại Học viện Sắc màu thế giới Pantone đã công bố
                                                    những gam màu sẽ lên ngôi trong mùa mốt năm 2018. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix hidden-sm"></div>
                                    <div class="clearfix visible-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="awe-section-10 " id="service-138791738">
            <section class="section_service_end">
                <div class="container">
                    <div class="row row-noGutter-2">
                        <div class="col-item-srv col-md-4 col-sm-12 col-xs-12">
                            <div class="service_item_ed">
                                <span class="iconx">
                                    <img src="frontend/image/cache/catalog/services/srv-1-0x0.png" alt="Giao hàng toàn quốc"
                                        class="fa" />
                                </span>
                                <div class="content_srv">
                                    <span class="title_service">Giao hàng toàn quốc</span>
                                    <span class="content_service">Miễn phí với đơn hàng trị giá trên 800.000đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-item-srv col-md-4 col-sm-12 col-xs-12">
                            <div class="service_item_ed">
                                <span class="iconx">
                                    <img src="frontend/image/cache/catalog/services/srv-2-0x0.png" alt="Hoàn tiền 100%"
                                        class="fa" />
                                </span>
                                <div class="content_srv">
                                    <span class="title_service">Hoàn tiền 100%</span>
                                    <span class="content_service">Hoàn tiền 100% đối với sản phẩm bị lỗi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-item-srv col-md-4 col-sm-12 col-xs-12">
                            <div class="service_item_ed">
                                <span class="iconx">
                                    <img src="frontend/image/cache/catalog/services/srv-3-0x0.png"
                                        alt="Sản phẩm chính hãng 100%" class="fa" />
                                </span>
                                <div class="content_srv">
                                    <span class="title_service">Sản phẩm chính hãng 100%</span>
                                    <span class="content_service">Sản phẩm được nhập khẩu chính hãng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>
<script>
    $(document).ready(function () {
        /*$('#section-verticalmenu').addClass('active-desk');*/
        if ($(window).width() > 991) {
            $('#section-verticalmenu').addClass('active');
            $('#column-left').css('padding-top', $('.float-vertical.active .block_content').height() - $('.section-ss-banner').height() + 20);
        }
        $(window).resize(function () {
            if ($(window).width() > 991) {
                $('#section-verticalmenu').addClass('active');
                $('#column-left').css('padding-top', $('.float-vertical.active .block_content').height() - $('.section-ss-banner').height() + 20);
            } else {
                $('#section-verticalmenu').removeClass('active');
                $('#column-left').css('padding-top', 0);
            }
        });
    });
</script>
@endsection
