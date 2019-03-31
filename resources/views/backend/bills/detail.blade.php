@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1006px;">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Bill: {{ $bill->id }}</h2>
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
                    <a
                        href="{{ route('bill.pdfexport',  ['id'=>$bill->id]) }}"
                        class="btn btn-info"
                        style="margin-left:29em;"
                    >
                        Export PDF
                    </a>
                    <div class="x_content">
                        <div class="col-lg-6">
                            <h2>Orderer: <span style="color:black; font-size:0.9em;">{{ $bill->username }}</span></h2>
                            <h2>Phone:  <span style="color:black; font-size:0.9em;">{{ $bill->phone }}</span></h2>
                            <h2>Order date: <span style="color:black; font-size:0.9em;">{{ $bill->created_at }}</span></h2>
                        </div>
                        <div class="col-lg-6">
                            <h2>Address: <span style="color:black; font-size:0.9em;">{{ $bill->address }}</span></h2>
                            <h2>Email: <span style="color:black; font-size:0.9em;">{{ $bill->email }}</span></h2>
                            <h2>Status:
                                <span style="color:black; font-size:0.9em;">
                                    @if($bill->status == 0)
                                        <span style="color:red;">Chưa Thanh Toán</span>
                                    @elseif($bill->status == 1)
                                        <span style="color:blue;">Đã Thanh Toán</span>
                                    @endif
                                </span>
                            </h2>
                        </div>
                        <div class="clearfix"></div>
                        <label style="font-size: 1.5em;">Bill includes: {{$bill->billdetails->count()}} product</label>
                        <table
                            id="datatable-checkbox"
                            class="table table-striped table-bordered bulk_action dataTable no-footer "
                            role="grid"
                            aria-describedby="datatable-checkbox_info"
                        >
                            <thead>
                                <tr role="row">
                                    <th style="width: 3%;">#</th>
                                    <th style="width: 17%;">Product name</th>
                                    <th style="width: 10%;">Storage</th>
                                    <th style="width: 7%;">Color</th>
                                    <th style="width: 20%;">Price</th>
                                    <th style="width: 20%;">Quantity</th>
                                    <th style="width: 10%;">Promotion</th>
                                    <th style="width: 13%;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bill->billdetails as $key => $item)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_storage }}</td>
                                    <td>{{ $item->product_color }}</td>
                                    <td>{{ number_format($item->price, 0, ',' ,'.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product_promotion }}</td>
                                    <td>{{ number_format($item->amount, 0, ',' ,'.') }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7" style="text-align:right; font-weight:bold;font-size:1.2em;">Total</td>
                                    <td>{{ number_format($bill->total, 0, ',' ,'.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a
                        href="{{route('bill.index')}}"
                        class="btn btn-warning"
                        style="float:right;margin-right:3em;"
                    >
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
