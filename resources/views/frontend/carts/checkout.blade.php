@extends('frontend.layouts.master')

@section('content')
<section class="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="{{ route('fe.home.index') }}">
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
            @php $count = Cart::getContent()->count() @endphp
            @if ( $count <= 0)
            <div class="page-information margin-bottom-50">
                <h1>Bạn Chưa Chọn Sản Phẩm Nào !!!</h1>
                <div class="col-sm-6 col-xs-6 col_button_checkout" style="margin-bottom:3em;">
                    <a
                        href="{{ route('fe.home.index') }}"
                        class="btn btn-primary button_checkout"
                    >
                        Tiếp tục mua hàng
                    </a>
                </div>
            </div>
            @else
            <div class="page-information margin-bottom-50">
                <h1 class="title-section-page">Giỏ hàng</h1>
                <div class="table-responsive table-cart-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td class="text-center"><strong>Sản phẩm</strong></td>
                                <td class="text-center"><strong>Màu</strong></td>
                                <td class="text-center"><strong>Đơn giá</strong></td>
                                <td class="text-center"><strong>Khuyến mãi</strong></td>
                                <td class="text-center"><strong>Số lượng</strong></td>
                                <td class="text-center"><strong>Tổng</strong></td>
                                <td class="text-center"><strong>Cập nhật</strong></td>
                                <td class="text-center"><strong>Xóa</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1@endphp
                            @foreach ($cart as  $item)
                            {{ Form::open(['url' => '/updateCart/' . $item->id  , 'method' => 'POST']) }}
                            <tr>
                                <td>{{ $i ++ }}</td>
                                <td class="text-left">
                                    <a href="{{ route('fe.product.detail', ['id'=>$item->id, 'slug'=>str_slug($item->name)]) }}">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    {{ $item->attributes->color }}
                                </td>
                                <td class="text-right"> {{ number_format(($item->price * 100) / (100 - $item->attributes['promotion']),0 ,',', '.') }}đ </td>
                                <td class="text-right" style="text-align:center;"> {{ $item->attributes->promotion }}% </td>
                                <td class="text-left">
                                    <div class="input-group btn-block">
                                        <span class="input-group-btn">
                                            <button
                                                onclick="var result = document.getElementById('qtyItem{{ $item->id }}'); var qtyItem = result.value; if(!isNaN(qtyItem) &amp;&amp; qtyItem > 1) result.value--; return false;"
                                                class="btn items-count btn-minus" type="button"
                                            >
                                                –
                                            </button>
                                        </span>
                                        <input
                                            type="text"
                                            name="quantity"
                                            value="{{ $item->quantity }}"
                                            size="4"
                                            id="qtyItem{{ $item->id }}"
                                            class="form-control input-text text-center number-sidebar input_pop input_pop"
                                            style="padding: 0; min-width: 90px"
                                            readonly="readonly"
                                        >
                                        <span class="input-group-btn">
                                            <button
                                                onclick="var result = document.getElementById('qtyItem{{ $item->id }}'); var qtyItem = result.value; if(!isNaN(qtyItem) &amp;&amp; qtyItem < {{$item->attributes['in_stock']}}) result.value++; return false;"
                                                class="btn items-count btn-plus"
                                                type="button"
                                            >
                                            +
                                            </button>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-right"> {{ number_format($item->price*$item->quantity,0 ,',', '.') }}đ </td>
                                <td class="text-center">
                                    {{  Form::button('<i class="fa fa-refresh"></i> Cập nhật', ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
                                    {{  Form::close() }}
                                </td>
                                <td class="text-center">
                                    {{ Form::open(['url' => '/deleteCart/' . $item->id  , 'method' => 'DELETE','onsubmit' => "return confirm('Bạn muốn xoá sản phẩm này khỏi giỏ hàng?');"]) }}
                                    {{ Form::button('<i class="fa fa-times-circle"></i> Xóa khỏi giỏ hàng', ['type' => 'submit', 'class' => 'btn btn-danger pull-right']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12"> </div>
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-right" style="font-weight:bold;">Thành tiền:</td>
                                    <td class="text-right"><strong>{{ number_format($subtotal,0 ,',', '.') }}đ</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 col_button_shopping">
                                <a href="{{ route('fe.home.index') }}" class="btn btn-default pull-left button_shopping">
                                    Tiếp tục mua hàng
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-6 col_button_checkout">
                                <a
                                    href="{{ route('fe.cart.pay') }}"
                                    class="btn btn-primary pull-right button_checkout"
                                >
                                    Tiến hành thanh toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
