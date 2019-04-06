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
                        <span><i class="fa">/</i></span>
                    </li>
                    <li class="">
                        <a itemprop="url">
                            <span itemprop="title">Tài khoản</span>
                        </a>
                        <span><i class="fa">/</i></span>
                    </li>
                    <li><strong itemprop="title">Đăng ký</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <div class="page-information margin-bottom-50">
                <h1>Đăng ký tài khoản</h1>
                <p>Nếu bạn đã đăng ký tài khoản với chúng tôi, vui lòng
                    <a href="{{ route('fe.login') }}" style="font-weight:bold; color:red;">
                        đăng nhập
                    </a>.
                </p>
                {{ Form::open
                    ([
                        'method' => 'POST',
                        'route' => 'fe.register.postregister',
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <fieldset id="account">
                        <legend>Chi tiết tài khoản</legend>
                        <div class="form-group required">
                            {{ Form::label('ht', 'Họ &amp; Tên đệm <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-firstname'], false) }}
                            <div class="col-sm-10">
                                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'input-firstname', 'placeholder' => 'Họ &amp; Tên đệm']) }}
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span class="style-span create-user" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group required">
                            {{ Form::label('us', 'Tên Đăng Nhập <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-name'], false) }}
                            <div class="col-sm-10">
                                {{ Form::text('username', null, ['class' => 'form-control', 'id' => 'input-lastname', 'placeholder' => 'Tên đăng nhập']) }}
                                {{ Form::hidden('role[]', 4, ['class' => 'form-control', 'id' => 'input-lastname', 'placeholder' => 'Tên đăng nhập']) }}
                                @if ($errors->has('username'))
                                    @foreach ($errors->get('username') as $error)
                                        <span class="style-span create-user" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group required">
                            {{ Form::label('em', 'Email <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-email'], false) }}
                            <div class="col-sm-10">
                                {{ Form::email('email','',['class' => 'form-control', 'id' => 'input-email', 'placeholder' => 'Email']) }}
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span class="style-span create-user" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group required">
                                {{ Form::label('birthday', 'Ngày Sinh', ['class' => 'col-sm-2 control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::date('birthday', null, ['class' => 'date-picker form-control', 'placeholder' => 'Ngày sinh', 'id' => 'input-birthday']) }}
                                    @if ($errors->has('birthday'))
                                        @foreach ($errors->get('birthday') as $error)
                                            <span class="style-span create-user" style="color:red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                    </fieldset>
                    <fieldset id="address">
                        <legend>Địa chỉ</legend>
                        <div class="form-group required">
                            {{ Form::label('phone', 'Số Điện Thoại <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-telephone'], false) }}
                            <div class="col-sm-10">
                                {{ Form::number('phone','',['class' => 'form-control', 'id' => 'input-telephone', 'placeholder' => 'Điện thoại']) }}
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span class="style-span create-user" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('ad', 'Địa Chỉ <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-address-1'], false) }}
                            <div class="col-sm-10">
                                {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'input-address-1', 'placeholder' => 'Địa chỉ']) }}
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $error)
                                        <span class="style-span create-user" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Mật khẩu</legend>
                        <div class="form-group required">
                            {{ Form::label('pass', 'Mật Khẩu <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-password'], false) }}
                            <div class="col-sm-10">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'input-password', 'placeholder' => 'Mật khẩu']) }}
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <span class="style-span create-user style-request" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group required">
                            {{ Form::label('rsp', 'Mật Khẩu Xác Nhận <span style="color:red;">*</span>', ['class' => 'col-sm-2 control-label', 'for' => 'input-confirm'], false) }}
                            <div class="col-sm-10">
                                {{ Form::password('passwordAgain', ['class' => 'form-control', 'id' => 'input-confirm', 'placeholder' => 'Mật khẩu xác nhận']) }}
                                @if ($errors->has('passwordAgain'))
                                    @foreach ($errors->get('passwordAgain') as $error)
                                        <span class="style-span create-user style-request" style="color:red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-right">
                            &nbsp;
                            <input type="submit" value="Tiếp tục" class="btn btn-primary">
                        </div>
                    </div>
                {{  Form::close()  }}
            </div>
        </div>
    </div>
</div>
@endsection
