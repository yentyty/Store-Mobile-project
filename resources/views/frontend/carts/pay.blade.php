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
                    <li><strong itemprop="title">Thanh toán</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<link href="frontend/catalog/view/theme/default/stylesheet/checkout.css" rel="stylesheet">
<div class="container">
    <div class="page-information margin-bottom-50">

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row">
                    {{ Form::open(['method' => 'POST', 'url' => '/success', 'id' => 'checkout_form', 'class' => 'form-horizontal']) }}
                        <div class="col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Địa chỉ nhận hàng
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group required">
                                        {{ Form::label('ht', 'Tên Đầy Đủ <span style="color:red;">*</span>', ['class' => 'control-label col-md-2', 'for' => 'input-firstname'], false) }}
                                        <div class="col-sm-10">
                                            {{ Form::text('username', isset(Auth::user()->id) ? Auth::user()->username : null, ['class' => 'form-control', 'id' => 'input-firstname', 'placeholder' => 'Ví dụ: Nguyễn Văn A']) }}
                                            @if ($errors->has('username'))
                                                <div>
                                                    <ul>
                                                        @foreach ($errors->get('username') as $error)
                                                        <li style="color:red;">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                {{ Form::label('em', 'Email <span style="color:red;">*</span>', ['class' => 'control-label col-sm-4', 'for' => 'input-email'], false) }}
                                                <div class="col-sm-8">
                                                    {{ Form::email('email', isset(Auth::user()->id) ? Auth::user()->email : null,['class' => 'form-control', 'id' => 'input-email', 'placeholder' => 'contact@yourdomain.com']) }}
                                                    @if ($errors->has('email'))
                                                        <div>
                                                            <ul>
                                                                @foreach ($errors->get('email') as $error)
                                                                <li style="color:red;">{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                {{ Form::label('ph', 'Điện Thoại <span style="color:red;">*</span>', ['class' => 'control-label col-sm-4', 'for' => 'input-telephone'], false) }}
                                                <div class="col-sm-8">
                                                    {{ Form::number('phone', isset(Auth::user()->id) ? Auth::user()->phone : null,['class' => 'form-control', 'id' => 'input-telephone', 'placeholder' => 'Ví dụ: 01234567890']) }}
                                                    @if ($errors->has('phone'))
                                                        <div>
                                                            <ul>
                                                                @foreach ($errors->get('phone') as $error)
                                                                <li style="color:red;">{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('ad', 'Địa Chỉ <span style="color:red;">*</span>', ['class' => 'control-label col-md-2', 'for' => 'input-address'], false) }}
                                        <div class="col-sm-10">
                                            {{ Form::text('address', isset(Auth::user()->id) ? Auth::user()->address : null, ['class' => 'form-control', 'id' => 'input-address', 'placeholder' => 'Ví dụ: Số 102, Hùng Vương, tp.Tam Kỳ']) }}
                                            @if ($errors->has('address'))
                                                <div>
                                                    <ul>
                                                        @foreach ($errors->get('address') as $error)
                                                        <li style="color:red;">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('tn', 'Lời nhắn', ['class' => 'control-label col-md-2', 'for' => 'input-zoneid'], false) }}
                                        <div class="col-sm-10">
                                            {{ Form::textarea('note', '', ['class' => 'form-control', 'id' => 'input-comment', 'rows' => '3', 'placeholder' => 'Ví dụ: Chuyển hàng ngoài giờ hành chính']) }}
                                            {{ Form::hidden('user_id', isset(Auth::user()->id) ? Auth::user()->id : null, ['class' => 'form-control', 'id' => 'input-address', 'placeholder' => 'Ví dụ: Số 102, Hùng Vương, tp.Tam Kỳ']) }}                                        </div>
                                            @if ($errors->has('note'))
                                                <div>
                                                    <ul>
                                                        @foreach ($errors->get('note') as $error)
                                                        <li style="color:red;">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="adr-oms checkbox">
                                                <input type="checkbox" name="same_info_as_buyer_toggle"
                                                    id="is-delivery-address" onclick="showHideDeliveryAddress()"
                                                    checked="" disabled>
                                                <label for="is-delivery-address">
                                                    <strong>Địa chỉ nhận hàng và thanh toán giống nhau</strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        Đơn hàng ({{Cart::getContent()->count()}} sản phẩm)
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <table class="adr-oms table table_order_items">
                                        <tbody id="orderItem">
                                            @foreach ($cart as $item)
                                                <tr class="group-type-1 item-child-0">
                                                    <td>
                                                        <div class="table_order_items-cell-detail">
                                                            <div class="table_order_items-cell-title">
                                                                <div class="table_order_items_product_name">
                                                                    <a target="_blank" rel="noopener"
                                                                        href="{{ route('fe.product.detail', ['id'=>$item->id, 'slug'=>str_slug($item->name)]) }}"
                                                                        title="{{ $item->name }}"
                                                                        >
                                                                        <span class="title">
                                                                            {{ $item->name }}
                                                                        </span>
                                                                        <span class="title">
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table_order_items-cell-price">
                                                            <div class="tt-price">{{ number_format($item->price,0 ,',', '.') }}đ</div>
                                                            <div class="quantity">x{{ $item->quantity }}</div>
                                                            <div class="tt-price">{{ number_format($item->price*$item->quantity,0 ,',', '.') }}đ</div>
                                                        </div>
                                                        <div class="table_order_items-cell-price"  style="padding-right:3em;">
                                                            {{ $item->attributes->color }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-default" id="ajax-load-total">
                                <div class="panel-body">
                                    <table class="adr-oms table">
                                        <tbody class="orderSummary">
                                            <tr class="row-total-amount">
                                                <td class="text-left" style="font-weight:bold;">Tổng tiền</td>
                                                <td class="text-right">
                                                    <strong class="">{{ number_format($subtotal,0 ,',', '.') }}đ</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-center">
                                <a class="pull-left" href="{{ route('fe.cart.checkout') }}"
                                    title="Quay lại giỏ hàng">
                                    <i class="fa fa-mail-reply-all" aria-hidden="true"></i> Quay lại giỏ hàng </a>
                                <button
                                    class="btn btn-primary pull-right"
                                    type="button"
                                    id="submit_form_button"
                                    onclick="$('form#checkout_form').submit();">Đặt hàng
                                    <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
