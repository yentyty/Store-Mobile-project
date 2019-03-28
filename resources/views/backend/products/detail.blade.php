@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1006px;">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Products: {{ $product->id }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
                        <div class="col-md-7 col-sm-7 col-xs-12" style="padding-left: 6em;">
                        @php $someArray = json_decode($product->image, true); @endphp
                            <div class="image">
                                <img id="expandedImg" style="margin-top:15px;" >
                                <div id="imgtext">
                                    <img src="uploads/images/products/{{ $someArray[0] }}">
                                </div>
                              </div>
                            <div class="product_gallery" style="margin-left: 1em;">
                                @foreach (json_decode($product->image) as $item)
                                    <a>
                                        <img
                                            src="uploads/images/products/{{ $item }}"
                                            style="margin-top:0;"
                                            onclick="myFunction(this);"
                                        >
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                            <h3 class="prod_title" style="margin-bottom: 0.75em;"> {{ $product->name }}</h3>
                            <i class="fa fa-calendar" style="padding-bottom: 1em;"></i> {{ date('d-m-Y', strtotime($product->updated_at)) }}
                            <br>
                            <i class="fa fa-suitcase" style="padding-bottom: 1em;"></i> Factory:
                            <span style="font-size:1.5em;">{{ $product->factory->name }}</span>
                            <br>
                            <i class="fa fa-gift" style="padding-bottom: 1em;"></i> Promotion:
                            <span style="font-size:1.5em;">{{ $product->promotion->percent }}%</span>
                            <br>
                            <i class="fa fa-calculator" style="padding-bottom: 1em;"></i> Quantity:
                            <span style="font-size:1.5em;">{{ $product->in_stock }}</span>
                            <br>
                            <ul style="list-style-type: none;">
                            @if(isset($product->promotion->percent))
                                <li>
                                    <h5 style="font-size: 1.25em; color: blue;">
                                        {{number_format($product->price - ($product->price * $product->promotion->percent / 100) , 0 ,',','.')}} VND
                                    </h5>
                                </li>
                                <li>
                                    <span style="text-decoration: line-through">
                                        {{number_format($product->price, 0, ',' ,'.')}} VND
                                    </span>
                                </li>
                            @else
                                <li>
                                    <h5>{{number_format($product->price, 0 ,',','.')}} VND</h5>
                                </li>
                            @endif
                            </ul>
                            <div class="">
                                <h2>
                                    <i class="fa fa-asterisk"></i> Color
                                </h2>
                                <ul class="list-inline prod_color">
                                        @foreach (json_decode($product->color) as $item)
                                    <li>
                                        <p>{{ $item}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="">
                                <h4>Storage: {{ $product->storage}} GB</h4>
                            </div>
                            <h2 style="text-align:center;">Specifications</h2>
                            <div class="x_content">
                                <table class="table">
                                    @php $someArray = json_decode($product->description, true); @endphp
                                    <tr>
                                        <td scope="row" style="width:50%;">Screen:</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['screen'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">Operating system:</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['OS'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">Camera                                               :</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['camera'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">CPU                                              :</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['cpu'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">Ram                                               :</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['ram'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">Sim                                                :</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['sim'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">Pin                                                :</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['pin'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" style="width:50%;">Fingerprint Sensor                                                   :</td>
                                        <td scope="row" style="width:50%; text-align: left">{{ $someArray['fingerprint'] }}</td>
                                    </tr>
                                </table>
                            </div>
                            <a
                                href="{{route('product.index')}}"
                                class="btn btn-warning"
                            >
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a
                                            href="#tab_content1" id="home-tab"
                                            role="tab" data-toggle="tab"
                                            aria-expanded="true"
                                        >
                                            Product information
                                        </a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div
                                        role="tabpanel"
                                        class="tab-pane fade active in"
                                        id="tab_content1"
                                        aria-labelledby="home-tab"
                                    >
                                        <p>{!! strip_tags($product->body) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      var imgText = document.getElementById("imgtext");
      expandImg.src = imgs.src;
      imgText.innerHTML = imgs.alt;
      expandImg.parentElement.style.display = "block";
    }
    </script>
@endpush
