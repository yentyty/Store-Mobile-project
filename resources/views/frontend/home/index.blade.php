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
                                                @foreach ($fatories as $ft)
                                                <li class="li_tab">
                                                    <a href="#content-tabb{{ $ft->id }}" class="head-tabs head-tab10"
                                                        data-src=".head-tab10">{{ $ft->name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="tabs-content tabs-content-featured col-md-12 col-sm-12 col-xs-12 no-padding">
                                        @foreach ($fatories as $ft)
                                        <div id="content-tabb{{ $ft->id }}" class="content-tab content-tab-proindex"
                                            style="display:none">
                                            <div class="row">
                                                @foreach ($ft->products as $pr)
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-20 custom-mobile">
                                                    <div class="wrp_item_small product-col">
                                                        <div class="product-box">
                                                            <div class="product-thumbnail">
                                                                @if($pr->promotion->id != 1)
                                                                <span class="sale-off">{{ $pr->promotion->percent }}%</span>
                                                                @endif
                                                                @php $someArray = json_decode($pr->image, true); @endphp
                                                                <a class="image_link display_flex"
                                                                    href="{{ route('fe.product.detail', ['id'=>$pr->id, 'slug'=>$pr->slug]) }}"
                                                                    title="{{ $pr->name }}">
                                                                    <img src="uploads/images/products/{{ $someArray[0] }}"
                                                                        data-lazyload="uploads/images/products/{{ $someArray[0] }}"
                                                                        alt="{{ $pr->name }}" />
                                                                </a>
                                                                <div class="product-action-grid clearfix">
                                                                    {!! Form::open(['url' => 'addCart/'. $pr->id, 'class' => 'variants form-nut-grid']) !!}
                                                                        <div>
                                                                            {{ Form::hidden('color', 'Trắng') }}
                                                                            {{  Form::button('<i class="fa fa-refresh"></i> Mua ngay', ['type' => 'submit', 'class' => 'btn-cart button_wh_40 left-to', 'title' => 'Mua ngay']) }}
                                                                            <a
                                                                                title="Xem"
                                                                                href="{{ route('fe.product.detail', ['id'=>$pr->id, 'slug'=>$pr->slug]) }}"
                                                                                class="button_wh_40 btn_view right-to quick-view">
                                                                                <i class="fa fa-eye"></i>
                                                                                <span class="style-tooltip">Xem</span>
                                                                            </a>
                                                                        </div>
                                                                    {{  Form::close() }}
                                                                </div>
                                                            </div>
                                                            <div class="product-info effect a-left">
                                                                <div class="info_hhh">
                                                                    <h3 class="product-name ">
                                                                        <a href="{{ route('fe.product.detail', ['id'=>$pr->id, 'slug'=>$pr->slug]) }}"
                                                                            title="{{ $pr->name }}">{{ $pr->name }}
                                                                        </a>
                                                                    </h3>
                                                                    <div class="price-box clearfix">
                                                                        @if($pr->promotion->id != 1)
                                                                            <strike>{{ number_format($pr->price, 0, ',','.') }} đ</strike>
                                                                        @endif
                                                                        <br>
                                                                        <span
                                                                            class="price product-price">{{ number_format($pr->price -($pr->price *($pr->promotion->percent /100)), 0, ',','.')}} đ</span>
                                                                        <span class="price product-price-old"
                                                                            style="text-decoration: none">&nbsp;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="clearfix hidden-xs hidden-sm hidden-md"></div>
                                                <div class="clearfix hidden-sm hidden-md hidden-lg"></div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                    @foreach ($news as $new)
                                        <div class="blog_items col-md-3 col-sm-6 col-xs-12">
                                            <div class="myblog"
                                                onclick="window.location.href='mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html';">
                                                <div class="image-blog-left">
                                                    <a href="{{ route('fe.news.detail', ['id'=>$new->id, 'slug'=>$new->slug]) }}">
                                                        <picture>
                                                            <source media="(max-width: 375px)"
                                                                srcset="uploads/images/news/{{ $new->cover_image }}">
                                                            <source media="(min-width: 376px) and (max-width: 767px)"
                                                                srcset="uploads/images/news/{{ $new->cover_image }}">
                                                            <source media="(min-width: 768px) and (max-width: 1023px)"
                                                                srcset="uploads/images/news/{{ $new->cover_image }}">
                                                            <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                                srcset="uploads/images/news/{{ $new->cover_image }}">
                                                            <source media="(min-width: 1200px)"
                                                                srcset="uploads/images/news/{{ $new->cover_image }}">
                                                            <img src="uploads/images/news/{{ $new->cover_image }}"
                                                                title="{{ $new->title }}"
                                                                alt="{{ $new->title }}" />
                                                        </picture>
                                                        <div class="hover_collection"></div>
                                                    </a>
                                                </div>
                                                <div class="content-right-blog">
                                                    <div class="content_day_blog">
                                                        <span class="fix_left_blog">
                                                            <i class="fa fa-calendar"></i>
                                                            <span class="news_home_content_short_time">{{ date('d-m-Y', strtotime($new->updated_at)) }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="title_blog_home">
                                                        <h3>
                                                            <a href="{{ route('fe.news.detail', ['id'=>$new->id, 'slug'=>$new->slug]) }}" title="">
                                                                {{ str_limit($new->title,50) }}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <p class=" text2line blog-item-summary">
                                                        {{ strip_tags(str_limit($new->description, 80)) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                        @foreach ($services as $sv)
                        <div class="col-item-srv col-md-4 col-sm-12 col-xs-12">
                            <div class="service_item_ed">
                                <span class="iconx">
                                    <img src="uploads/images/services/{{ $sv->icon }}" alt="{{ $sv->name }}"
                                        class="fa" />
                                </span>
                                <div class="content_srv">
                                    <span class="title_service">{{ $sv->name }}</span>
                                    <span class="content_service">{{ strip_tags(str_limit($sv->description, 40)) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
