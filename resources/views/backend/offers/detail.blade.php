@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1006px;">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Offer: {{ $offer->id }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            </li>
                            <li class="dropdown">
                                <a
                                href="#"
                                class="dropdown-toggle"
                                data-toggle="dropdown" role="button"
                                aria-expanded="false"
                                >
                                    <i class="fa fa-wrench"></i>
                            </a>
                            </li>
                            <li>
                                <a class="close-link">
                                    <i class="fa fa-close"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="product-image">
                                @if (!empty($offer->image))
                                    <img src="uploads/images/offers/{{ $offer->image }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                            <h3 class="prod_title" style="margin-bottom: 0.75em;"> {{ $offer->title }}</h3>
                            <i class="fa fa-calendar" style="padding-bottom: 1em;"></i> {{ date('d-m-Y', strtotime($offer->updated_at)) }}
                            <br>
                            <i class="fa fa-suitcase" style="padding-bottom: 1em;"></i> Factory: {{ $offer->factory->name }}
                            <p>{{ $offer->description }}</p>
                            <p>{!! strip_tags($offer["content"]) !!}</p>
                            <div class="">
                                    <a
                                    href="{{route('offer.index')}}"
                                    class="btn btn-warning"
                                >
                                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancle
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
