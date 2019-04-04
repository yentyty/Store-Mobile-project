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
                    <li><strong itemprop="title">{{ $infoDetail->title }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <div class="page-information margin-bottom-50">
                <h1 class="title-section-page">{{ $infoDetail->title }}</h1>
                <p
                    style="margin-bottom: 10px; padding: 0px; color: rgb(82, 82, 82); font-family: Arial, Helvetica, sans-serif;">
                    {{ $infoDetail->content }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
