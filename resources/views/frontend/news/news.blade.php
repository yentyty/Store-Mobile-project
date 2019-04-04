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
                                                    <div class="myblog"
                                                        onclick="window.location.href='mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html';">
                                                        <div class="image-blog-left">
                                                            <a href="mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html">
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
                                                                        title="Màu sắc nào sẽ thống trị làng mốt trong năm 2018?"
                                                                        alt="Màu sắc nào sẽ thống trị làng mốt trong năm 2018?" style="width:100%;">
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
                                                                    <span class="news_home_content_viewed">109</span>
                                                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                    <i class="fa fa-comments"></i>
                                                                    <span class="news_home_content_comments">0</span>
                                                                </span>
                                                            </div>
                                                            <div class="title_blog_home">
                                                                <h3>
                                                                    <a href="mau-sac-nao-se-thong-tri-lang-mot-trong-nam-2018.html"
                                                                        title="Màu sắc nào sẽ thống trị làng mốt trong năm 2018?">
                                                                        {{ str_limit(strip_tags($new->title,15)) }}
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <p class=" text2line blog-item-summary">
                                                                {{ str_limit(strip_tags($new->description,15)) }}
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
                    <div class="row">
                        <div class="col-xs-12 text-center"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


@endsection
