@extends('frontend.layouts.master')

@section('content')
<section class="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope="" itemtype="">
                    <li class="home">
                        <a itemprop="url" href="index.html">
                            <span itemprop="title">
                                <i class="fa fa-home"></i>
                            </span>
                        </a>
                        <span>
                            <i class="fa">/</i>
                        </span>
                    </li>
                    <li class="">
                        <a itemprop="url" href="indexe223.html?route=account/account">
                            <span itemprop="title">Tài khoản</span>
                        </a>
                        <span>
                            <i class="fa">/</i>
                        </span>
                    </li>
                    <li>
                        <strong itemprop="title">Đăng nhập</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <div class="page-information margin-bottom-50">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well">
                            <h2>Khách hàng mới</h2>
                            <p>
                                <strong>Đăng ký</strong>
                            </p>
                            <p>Bằng việc tạo tài khoản bạn có thể mua sắm nhanh hơn, theo dõi trạng thái đơn hàng, và
                                theo dõi đơn hàng mà bạn đã đặt.</p>
                            <a href="{{ route('fe.register.getregister') }}" class="btn btn-primary">Tiếp tục</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h2>Khách hàng cũ</h2>
                            <p><strong>Tôi là khách hàng cũ</strong></p>
                            {{ Form::open(['method' => 'POST', 'route' => ['fe.postLogin'], 'class' => 'login-form']) }}
                                <div class="form-group">
                                    {{ Form::label('email', 'Địa chỉ Email', ['class'=>'control-label', 'for' => 'input-email']) }}
                                    {{ Form::email('email', '', ['placeholder'=>'Địa chỉ Email', 'class'=>'form-control', 'id' => 'nput-email', 'autofocus'=>'']) }}
                                    @if ($errors->has('email'))
                                        @foreach ($errors->get('email') as $error)
                                            <span class="style-span create-user style-request" style="color:red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password','Mật Khẩu', ['class'=>'control-label', 'for' => 'input-password']) }}
                                    {{ Form::password('password', ['placeholder'=>'Mật khẩu', 'class'=>'form-control', 'id'=> 'input-password']) }}
                                    @if ($errors->has('password'))
                                        @foreach ($errors->get('password') as $error)
                                            <span class="style-span create-user style-request" style="color:red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                {{ Form::button(
                                    'Đăng nhập',
                                    ['class' => 'btn btn-primary',
                                    'type' => 'submit'])
                                }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
