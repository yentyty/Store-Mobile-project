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
                    <li><strong itemprop="title">Sản phẩm Cùng Loại</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                @foreach($listfactory as $product)
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 padding-small">
                        <div class="product-col">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    @if($product->promotion->id != 1)
                                        <span class="sale-off">{{ $product->promotion->percent }}%</span>
                                    @endif
                                    @php $someArray = json_decode($product->image, true); @endphp
                                    <a class="image_link display_flex" href="{{ route('fe.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}"
                                        title="{{ $product->name }}">
                                        <img src="uploads/images/products/{{ $someArray[0] }}"

                                            data-lazyload="uploads/images/products/{{$someArray[0]}}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="product-action-grid clearfix">
                                        <form class="variants form-nut-grid">
                                            <div>
                                                <button class="btn-cart button_wh_40 left-to" title="Mua ngay" type="button"
                                                    onclick="window.location.href='indexf1a8.html?route=checkout/cart/add&amp;product_id=219&amp;redirect=true'">Mua
                                                    ngay</button>
                                                <!--onclick="cart.add(, 1)"></button>-->
                                                <a title="Xem" href="{{ route('fe.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}"
                                                    class="button_wh_40 btn_view right-to quick-view">
                                                    <i class="fa fa-eye"></i>
                                                    <span class="style-tooltip">Xem</span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if ($product->promotion->percent == 0)
                                <div class="product-info effect a-left">
                                    <div class="info_hhh">
                                        <h3 class="product-name ">
                                            <a href="{{ route('fe.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" title="{{ $product->name }}">
                                                {{ $product->name }}
                                            </a>
                                            <br>
                                        </h3>
                                        <div class="price-box clearfix">
                                            <span class="price product-price">{{ number_format($product->price -($product->price *($product->promotion->percent /100)), 0, ',','.')}} đ</span>
                                            <span class="price product-price-old" style="text-decoration: none">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="product-info effect a-left">
                                    <div class="info_hhh">
                                        <h3 class="product-name ">
                                            <a href="{{ route('fe.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" title="{{ $product->name }} ">
                                                {{ $product->name }}
                                            </a>
                                            <br>
                                            <strike>{{ number_format($product->price, 0, ',','.') }} đ</strike>
                                        </h3>
                                        <div class="price-box clearfix">
                                            <span class="price product-price">{{ number_format($product->price -($product->price *($product->promotion->percent /100)), 0, ',','.')}} đ</span>
                                            <span class="price product-price-old" style="text-decoration: none">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="text-right">
           {{ $listfactory->links() }}
        </div>
    </div>
</div>
@endsection
