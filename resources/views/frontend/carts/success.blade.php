@extends('frontend.layouts.master')

@section('content')
<section class="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="http://store-mobile-project.test">
                            <span itemprop="title">
                                <i class="fa fa-home"></i>
                            </span>
                        </a>
                        <span>
                            <i class="fa">/</i>
                        </span>
                    </li>
                    <li><strong itemprop="title">Giỏ hàng</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <div class="page-information margin-bottom-50">
                <h1>Bạn Đã đặt hàng thành công !!!</h1>
                <div class="col-sm-6 col-xs-6 col_button_checkout" style="margin-bottom:3em;">
                    <a href="http://store-mobile-project.test" class="btn btn-primary button_checkout">
                        Tiếp tục mua hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
