@extends('frontend.layouts.master')

@section('content')
<section class="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="{{ route('fe.home.index') }}">
                            <span itemprop="title"><i class="fa fa-home"></i></span>
                        </a>
                        <span><i class="fa">/</i></span>
                    </li>
                    <li class="">
                        <a itemprop="url" href="{{ route('fe.home.index') }}">
                            <span itemprop="title">Sản phẩm</span>
                        </a>
                        <span><i class="fa">/</i></span>
                    </li>
                    <li class="">
                        <a itemprop="url" href="thoi-trang-nu.html">
                            <span itemprop="title">{{ $productdetail->factory->name }}</span>
                        </a>
                        <span><i class="fa">/</i></span>
                    </li>
                    <li><strong itemprop="title">{{ $productdetail->name }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="product margin-top-20" itemscope="" itemtype="http://schema.org/Product">
    <div class="container">
        <div class="main-product-page">
            <div class="row">
                <div class="details-product">
                    <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                        <div class="rows">
                            <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-5 col-lg-5">
                                <div class="row">
                                    <!-- product images -->
                                    @php $someArray = json_decode($productdetail->image, true); @endphp
                                    <div class="col_large_default large-image" style="width: 80%;">
                                        <a class="large_image_url checkurl"
                                            data-rel="prettyPhoto[product-gallery]">
                                            <div style="height:460.5px;width:460.5px;" class="zoomWrapper">
                                                <img
                                                    id="img_01" class="img-responsive"
                                                    alt="{{ $productdetail->name }}"
                                                    src="uploads/images/products/{{ $someArray[0] }}"
                                                    data-zoom-image="uploads/images/products/{{ $someArray[0] }}"
                                                    style="position: absolute;"
                                                >
                                            </div>
                                        </a>
                                        <div class="hidden">
                                        </div>
                                    </div>
                                    <!-- product thumbs -->
                                    <div class="product-detail-thumb" style="width: 22em; margin-left:3em;">
                                        <div id="gallery_02"
                                            class="owl-carousel owl-theme thumbnail-product thumb_product_details not-dqowl owl-loaded owl-drag"
                                            data-loop="false" data-lg-items="4" data-md-items="4" data-sm-items="3"
                                            data-xs-items="3" data-xxs-items="3">
                                            @foreach (json_decode($productdetail->image) as $item)
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 116px;">
                                                    <div class="owl-item active" style="width: 115.625px;">
                                                        <div class="item">
                                                            <a
                                                                data-image="uploads/images/products/{{ $item }}"
                                                                data-zoom-image="uploads/images/products/{{ $item }}">
                                                                <img data-img="uploads/images/products/{{ $item }}"
                                                                    src="uploads/images/products/{{ $item }}"
                                                                    alt="{{ $productdetail->name }} "
                                                                    style="padding-right: 1em;"
                                                                >
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::open(['url' => 'addCart/'. $productdetail->id]) !!}
                            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 details-pro">
                                <h1 class="title-product">{{ $productdetail->name }}</h1>
                                <div class="group-status">
                                    <span class="first_status">Mã sản phẩm:
                                        <span class="status_name">{{ $productdetail->id }}</span>
                                        <span class="space">&nbsp; | &nbsp;</span>
                                    </span>
                                    <span class="first_status">
                                        Tình trạng:
                                        @if( $productdetail->in_stock  > 0)
                                        <span class="status_name availabel">Còn Hàng</span>
                                        @else
                                        <span class="status_name availabel">Hết Hàng</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="price-box" itemscope="" itemtype="http://schema.org/Offer">
                                    <span class="special-price">
                                        <span class="price product-price" itemprop="price">{{ number_format($productdetail->price -($productdetail->price *($productdetail->promotion->percent /100)), 0, ',',',')}}đ</span>
                                        @if($productdetail->promotion->id != 1)
                                            <strike style="font-size: 1.25em;margin-left: 1em;">{{ number_format($productdetail->price, 0, ',','.') }} đ</strike>
                                        @endif
                                        <br>
                                        <span style="margin-right:1em;">Chọn màu :</span>
                                        @foreach(json_decode($productdetail->color) as $color)
                                            {{ Form::radio('color', $color, true) }}<span style="margin-right:1em;">{{ $color }}</span>
                                        @endforeach
                                    </span>
                                </div>
                                <br>
                                <br>
                                <div id="product" class="form-product col-sm-12">
                                    <div class="form-group form_button_details">
                                        <div class="form_hai ">
                                            <div class="button_actions">
                                                @if( $productdetail->in_stock  > 0)
                                                {{ Form::hidden('in_stock', $productdetail->in_stock) }}
                                                {!! Form::button('Thêm vào giỏ hàng',['type' => 'submit', 'class' => 'btn btn-lg btn-block btn-cart button_cart_buy_enable add_to_cart btn_buy', 'id' => 'button-cart']) !!}
                                                @else
                                                {!! Form::button('Thêm vào giỏ hàng',['type' => 'submit', 'class' => 'btn btn-lg btn-block btn-cart button_cart_buy_enable add_to_cart btn_buy', 'id' => 'button-cart',  'disabled' => 'disabled']) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div id="block-tab-infor" class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
                            <div class="row margin-top-50 xs-margin-top-15">
                                <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 no-padding">
                                    <div class="product-tab e-tabs">
                                        <ul class="tabs tabs-title clearfix">
                                            <li class="tab-link current" data-tab="tab-description">
                                                <h3>
                                                    <span>Thông Số Kỹ Thuật</span>
                                                </h3>
                                            </li>
                                            <li class="tab-link fren" data-tab="tab-specifications">
                                                <h3>
                                                    <span>Mô tả</span>
                                                </h3>
                                            </li>
                                            <li class="tab-link" data-tab="tab-review">
                                                <h3>
                                                    <span>Đánh giá (0)</span>
                                                </h3>
                                            </li>

                                        </ul>
                                        <div class="tab-content current" id="tab-description">
                                            <div class="rte">
                                                <table class="table" style="margin-bottom:-3em;">
                                                    @php $someArray = json_decode($productdetail->description, true); @endphp
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Màn Hình:</td>
                                                        <td scope="row" style="width:50%; text-align: left; color:blue;">{{ $someArray['screen'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Hệ Điều Hành:</td>
                                                        <td scope="row" style="width:50%; text-align: left; color:blue;">{{ $someArray['OS'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Camera                                               :</td>
                                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['camera'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">CPU                                              :</td>
                                                        <td scope="row" style="width:50%; text-align: left;color:blue;">{{ $someArray['cpu'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Ram                                               :</td>
                                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['ram'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Sim                                                :</td>
                                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['sim'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Pin                                                :</td>
                                                        <td scope="row" style="width:50%; text-align: left; color:blue;">{{ $someArray['pin'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width:50%;">Cảm Biến Vân Tay                                                  :</td>
                                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['fingerprint'] }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="tab-review">
                                            <div class="rte">
                                                <div id="zozoweb-product-reviews" class="zozoweb-product-reviews">
                                                    <div class="">
                                                        <div id="zozoweb-product-reviews-sub">
                                                            <span class="product-reviews-summary-actions">
                                                                <input type="button" data-fancybox=""
                                                                    data-src="#bpr-form" id="btnnewreview"
                                                                    value="Viết đánh giá">
                                                            </span>
                                                            <div class="zozoweb-product-reviews-form fancybox-content"
                                                                id="bpr-form" style="display: none;">
                                                                <form id="form-review"
                                                                    name="zozoweb-product-reviews-frm">
                                                                    <h4>Viết đánh giá</h4>
                                                                    <fieldset class="bpr-form-rating">
                                                                        <div id="dvRating"
                                                                            style="cursor: pointer; color: rgb(255, 190, 0);">
                                                                            Chưa tốt&nbsp;
                                                                            <input type="radio" name="rating"
                                                                                value="1">&nbsp;
                                                                            <input type="radio" name="rating"
                                                                                value="2">&nbsp;
                                                                            <input type="radio" name="rating"
                                                                                value="3">&nbsp;
                                                                            <input type="radio" name="rating"
                                                                                value="4">&nbsp;
                                                                            <input type="radio" name="rating"
                                                                                value="5">&nbsp;
                                                                            Tốt </div>
                                                                    </fieldset>
                                                                    <fieldset class="bpr-form-contact">
                                                                        <div class="bpr-form-contact-name require">
                                                                            <input type="text" maxlength="128"
                                                                                id="review_author" name="name" value=""
                                                                                placeholder="Họ tên">
                                                                        </div>
                                                                        <div class="bpr-form-contact-email require">
                                                                            <input type="text" maxlength="128"
                                                                                id="review_email" name="email" value=""
                                                                                placeholder="Họ tên">
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="bpr-form-review">
                                                                        <div class="bpr-form-review-body">
                                                                            <textarea maxlength="1500" id="review_body"
                                                                                name="text" rows="5"
                                                                                placeholder="Nội dung đánh giá"></textarea>
                                                                            <span class="bpr-form-message-error"><span
                                                                                    class="text-danger">Chú ý:</span>
                                                                                Không sử dụng các định dạng HTML!</span>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="bpr-form-review">
                                                                    </fieldset>
                                                                    <fieldset class="bpr-form-review-error valid">
                                                                    </fieldset>
                                                                    <fieldset class="bpr-form-actions">
                                                                        <input type="button" id="button-review"
                                                                            value="Tiếp tục"
                                                                            class="bpr-button-submit btn btn-info">
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                            <div id="review"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content fren" id="tab-specifications">
                                            <div class="rte">
                                                <p>
                                                    <span style="font-weight: 700; color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 14px;">
                                                        ĐÔI NÉT VỀ SẢN PHẨM {{ strtoupper($productdetail->name) }}
                                                    </span>
                                                    <br
                                                    style="color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 14px;">
                                                    <span style="color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 14px;">
                                                        {!! strip_tags($productdetail->body) !!}
                                                    </span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <style>
                            .fb-comments,
                            .fb-comments * {
                                width: 100% !important;
                                display: block !important;
                                float: left;
                            }
                        </style>
                        <div class="fb-comments"
                            data-href="http://yennguyen.myzozo.net/ao-hoodie-nu-chu-theu-thoi-trang-sid53235"
                            data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 related-product margin-top-30 xs-margin-top-0">
                <div class="section_prd_feature">
                    <div class="heading heading_related_h">
                        <h2 class="title-head">
                            <a href="javascript:void(0)">Sản phẩm Liên quan</a>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="products product_related products-view-grid-bb owl-carousel owl-theme products-view-grid not-dot2 owl-loaded owl-drag"
                            data-dot="false" data-nav="false" data-lg-items="6" data-md-items="4" data-sm-items="3"
                            data-xs-items="2" data-margin="30">
                            @foreach ($anotherproduct as $anopr)
                            @php $someArray = json_decode($anopr->image, true); @endphp
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                    <div class="owl-item active" style="width: 190px;">
                                        <div class="item saler_item col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                            <div class="owl_item_product product-col">
                                                <div class="product-box">
                                                    <div class="product-thumbnail">
                                                        @if($anopr->promotion->id != 1)
                                                        <span class="sale-off">{{ $anopr->promotion->percent }}%</span>
                                                        @endif
                                                        <a class="image_link display_flex"
                                                            href="{{ route('fe.product.detail', ['id'=>$anopr->id, 'slug'=>$anopr->slug]) }}"
                                                            title="{{ $anopr->name }}">
                                                            <img src="uploads/images/products/{{ $someArray[0] }}"
                                                                data-lazyload="uploads/images/products/{{ $someArray[0] }}"
                                                                alt="{{ $anopr->name }}"
                                                                style="padding-right:1em;"
                                                            >
                                                        </a>
                                                        <div class="product-action-grid clearfix">
                                                            <form class="variants form-nut-grid">
                                                                <div>
                                                                    <button class="btn-cart button_wh_40 left-to"
                                                                        title="Mua ngay" type="button"
                                                                        onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=219&amp;redirect=true'">Mua
                                                                        ngay</button>
                                                                    <!--onclick="cart.add(, 1)"></button>-->
                                                                    <a title="Xem"
                                                                        href="{{ route('fe.product.detail', ['id'=>$anopr->id, 'slug'=>$anopr->slug]) }}"
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
                                                                <a href="{{ route('fe.product.detail', ['id'=>$anopr->id, 'slug'=>$anopr->slug]) }}"
                                                                    title="Kính Mát Nam GOLDSUN GS217003 S1 " style="padding-right:1em;">
                                                                    {{ $anopr->name }}
                                                                </a>
                                                            </h3>
                                                            <div class="price-box clearfix">
                                                                @if($anopr->promotion->id != 1)
                                                                    <strike>{{ number_format($anopr->price, 0, ',','.') }} đ</strike>
                                                                @endif
                                                                <br>
                                                                <span class="price product-price">{{ number_format($anopr->price -($anopr->price *($anopr->promotion->percent /100)), 0, ',','.')}} đ</span>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
