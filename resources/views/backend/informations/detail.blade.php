@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1006px;">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Information: {{ $information->id }}</h2>
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
                        <div class="col-xs-12" style="border:0px solid #e5e5e5;">
                            <h3 class="prod_title" style="margin-bottom: 0.75em;"> {{ $information->title }}</h3>
                            <p>{!! strip_tags($information["content"]) !!}</p>
                            <div class="">
                                <a
                                href="{{route('information.index')}}"
                                class="btn btn-warning"
                                >
                                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
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
