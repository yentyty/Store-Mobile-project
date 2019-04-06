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
                    <li>
                        <a itemprop="title" href="{{ route('fe.new.index') }}">Tin Tức</a>
                        <span>
                            <i class="fa">/</i>
                        </span>
                    </li>
                    <li>
                        <strong itemprop="title">{{ $newdetail->title }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container article-wraper" itemscope="" itemtype="http://schema.org/Article">
    <div class="main-article">
        <div class="row">
            <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                <div class="box-heading relative">
                    <article class="article-main">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="article-details">
                                    <h1 class="article-title">
                                        <a href="javascript:void(0)">{{ $newdetail->title }}</a>
                                    </h1>
                                    <div class="date">
                                        <div class="news_home_content_short_time">
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ date('d-m-Y', strtotime($newdetail->updated_at)) }}</span>
                                        </div>
                                        <div class="post-time">
                                            <i class="fa fa-eye"></i>
                                            <span>109</span>
                                        </div>
                                    </div>
                                    <div class="article-content">
                                        <div class="rte">
                                            <p>
                                            <img data-thumb="original" original-height="600" original-width="600"
                                                src="uploads/images/news/{{ $newdetail->cover_image }}"
                                                style="border-style: none; max-width: 100%; height: auto; margin: 0px;">
                                            </p>
                                            <p>
                                                <strong>
                                                    {{ $newdetail->description }}
                                                </strong>
                                            </p>
                                            <p
                                                style="margin-bottom: 15px; color: rgb(137, 137, 137); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px;">
                                                <img data-thumb="original" original-height="600" original-width="600"
                                                    src="uploads/images/news/{{ $newdetail->content_image }}"
                                                    style="border-style: none; max-width: 100%; height: auto; margin: 0px;">
                                            </p>
                                            <p
                                                style="margin-bottom: 15px; color: rgb(137, 137, 137); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 14px;">
                                                {!! strip_tags($newdetail->content) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12">
                                <h4>Tin liên quan</h4>
                                <div class="news-related">
                                    <ul style="list-style: none">
                                        @foreach ($newanother as $newano)
                                            <li>
                                                <a href="{{ route('fe.news.detail', ['id'=>$newano->id, 'slug'=>$newano->slug]) }}"
                                                    title="Cập nhật mẫu kính râm đang được sao Việt ưa chuộng"
                                                    alt="Cập nhật mẫu kính râm đang được sao Việt ưa chuộng">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    {{ str_limit($newano->title, 70) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
