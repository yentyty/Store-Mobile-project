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
                    <li><strong itemprop="title">Liên hệ với chúng tôi</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="margin-top-0">
    <div class="container contact-page">
        <div class="row">
            <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                <div class="row">
                    <h1 class="title-section-page hidden">Liên hệ với chúng tôi</h1>
                    <div class="section_maps col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="box-maps">
                            <div class="iFrameMap">
                                <div class="google-map">
                                    <div id="contact_map" class="map">
                                        <style>
                                            .container_iframe_google_map iframe {
                                                width: 100% !important;
                                                height: 300px !important;
                                            }
                                        </style>
                                        <div class="container_iframe_google_map">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61489.36161245609!2d108.46473419294777!3d15.58710140580772!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3169dcc1b9922cc9%3A0x15678bdf2baff71!2zVHAuIFRhbSBL4buzLCBRdeG6o25nIE5hbQ!5e0!3m2!1svi!2s!4v1554385337515!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-30">
                        <div class="page_cotact">
                            <h2 class="title-head-contact a-left">
                                <span>Địa chỉ của chúng tôi</span>
                            </h2>
                        </div>
                        @foreach ($introduce as $intro)
                        <div class="content">
                            <div class="intro">
                                <span><strong>{{ $intro->name }}</strong></span>
                            </div>
                            <div class="item_contact">
                                <div class="body_contact">
                                    <span class="contact_info">
                                        <span>Địa chỉ: {{ $intro->address }}</span>
                                    </span>
                                </div>
                                <div class="body_contact item_2_contact">
                                    <span class="contact_info">
                                       Điện thoại: {{ $intro->phone }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-30">
                        <div class="page-login page_cotact">
                            <h2 class="title-head-contact a-left">
                                <span>Thông tin liên hệ</span>
                            </h2>
                            <div id="pagelogin">
                                {{ Form::open(['method' => 'POST', 'route' => 'fe.contact.store', 'id' => 'contact']) }}
                                    <div class="form-signup clearfix">
                                        <div class="row group_contact">
                                            <fieldset class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Tên của bạn', 'id' => 'name']) }}
                                                @if ($errors->has('name'))
                                                    <div>
                                                        <ul>
                                                            @foreach ($errors->get('name') as $error)
                                                            <li style="color:red;">{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </fieldset>
                                            <fieldset class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                {{ Form::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Địa chỉ Email', 'id' => 'email', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$']) }}
                                                @if ($errors->has('email'))
                                                    <div>
                                                        <ul>
                                                            @foreach ($errors->get('email') as $error)
                                                            <li style="color:red;">{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </fieldset>
                                            <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                {{ Form::textarea('content', null, ['class'=>'form-control content-area form-control-lg','placeholder'=>'Nội dung', 'rows' => '5', 'id' => 'comment']) }}
                                                @if ($errors->has('content'))
                                                    <div>
                                                        <ul>
                                                            @foreach ($errors->get('content') as $error)
                                                            <li style="color:red;">{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </fieldset>
                                            <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            </fieldset>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
                                                <button type="submit" class="btn btn-primary">Gửi đi</button>
                                            </div>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
