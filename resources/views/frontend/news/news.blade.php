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
                        <strong itemprop="title">Tin tức</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container" itemscope="" itemtype="http://schema.org/Blog">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <div class="row">
                <section class="right-content margin-bottom-30 col-md-12">
                    <section class="list-blogs blog-main">
                        <div class="row">
                            @foreach ($news as $new)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <article class="blog-item">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="blog_items">
                                                <div class="myblog">
                                                    <div class="image-blog-left">
                                                        <a href="{{ route('fe.news.detail', ['id'=>$new->id, 'slug'=>$new->slug]) }}">
                                                            <picture>
                                                                <source media="(max-width: 375px)"
                                                                    srcset="uploads/images/news/{{ $new->cover_image }}">
                                                                <source
                                                                    media="(min-width: 376px) and (max-width: 767px)"
                                                                    srcset="uploads/images/news/{{ $new->cover_image }}">
                                                                <source
                                                                    media="(min-width: 768px) and (max-width: 1023px)"
                                                                    srcset="uploads/images/news/{{ $new->cover_image }}">
                                                                <source
                                                                    media="(min-width: 1024px) and (max-width: 1199px)"
                                                                    srcset="uploads/images/news/{{ $new->cover_image }}">
                                                                <source media="(min-width: 1200px)"
                                                                    srcset="uploads/images/news/{{ $new->cover_image }}">
                                                                <img src="uploads/images/news/{{ $new->cover_image }}"
                                                                    title="{{ str_limit($new->title, 15) }}"
                                                                    alt="{{ str_limit($new->title, 15) }}">
                                                            </picture>
                                                            <div class="hover_collection"></div>
                                                        </a>
                                                    </div>
                                                    <div class="content-right-blog">
                                                        <div class="content_day_blog">
                                                            <span class="fix_left_blog">
                                                                <i class="fa fa-calendar"></i>
                                                                <span
                                                                    class="news_home_content_short_time">{{ date('d-m-Y', strtotime($new->updated_at)) }}</span>
                                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                <i class="fa fa-eye"></i>
                                                                <span class="news_home_content_viewed">119</span>
                                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                <i class="fa fa-comments"></i>
                                                                <span class="news_home_content_comments">0</span>
                                                            </span>
                                                        </div>
                                                        <div class="title_blog_home">
                                                            <h3>
                                                                <a href="{{ route('fe.news.detail', ['id'=>$new->id, 'slug'=>$new->slug]) }}"
                                                                    title="Mix đồ Jean thế nào đẹp, fashionable?">
                                                                    {{ str_limit($new->title, 50) }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <p class=" text2line blog-item-summary">
                                                            {{ strip_tags(str_limit($new->description, 80)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                            <div class="clearfix visible-sm"></div>
                        </div>
                        <div class="text-right">
                            {{ $news->links() }}
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
