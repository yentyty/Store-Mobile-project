@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 3771px;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Statistics <small>Products sold</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false">
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
                    <section class="wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="clear"></div>
                                <section class="panel">
                                    <header class="panel-heading" style="text-align: center;">
                                        <h2>Statistics of the number of products sold in:</h2>
                                        {{ Form::open(['url' => 'admin/statistics/product', 'method' => 'GET' ]) }}
                                        {{ Form::label('month', 'Month') }}
                                        {{ Form::selectRange('month', 1, 12, !empty(request()->input('month')) ? request()->input('month') : date('m'), ['style' => 'margin-right:1.5em;'] ) }}
                                        {{ Form::label('year', 'Year') }}
                                        {{ Form::selectYear('year', 2017, 2050, !empty(request()->input('year')) ? request()->input('year') : date('Y'), ['style' => 'margin-right:1.5em;']) }}
                                        {{ Form::submit('Find', ['class' => 'btn btn-info']) }}
                                        {{ Form::close() }}
                                    </header>
                                    <table class="table table-striped table-advance table-hover">
                                        <tbody>
                                        <tr>
                                            <p style="font-weight:bold;">Statistics are {{count($products)}} results</p>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th><i class="icon_info_alt"></i> Product Name</th>
                                            <th>Price</th>
                                            <th>Promotion</th>
                                            <th>Sum Quantity</th>
                                        </tr>
                                        @php $i = 1 @endphp
                                        @if(isset($products))
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ number_format($product->price, 0, ',','.') }}đ</td>
                                                    <td>{{ $product->product_promotion }}%</td>
                                                    <td>{{ $product->qty }}</td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                        <div id="pagination" class="text-center">

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
