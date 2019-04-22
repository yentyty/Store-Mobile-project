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
                        <li><strong itemprop="title">Lịch sử đặt hàng</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                <div class="page-information margin-bottom-50">
                    <h1>Lịch Sử đặt hàng</h1>
                    <h5>Khách hàng: {{ Auth::user()->name}}</h5>
                    <p>Đã đặt: {{ count($bills) }} đơn hàng</p>
                    <fieldset id="account">
                        <legend>Chi tiết các đơn hàng</legend>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td class="text-center"><strong>Sản phẩm</strong></td>
                                    <td class="text-center"><strong>Đơn giá</strong></td>
                                    <td class="text-center"><strong>Khuyến mãi</strong></td>
                                    <td class="text-center"><strong>Số lượng</strong></td>
                                    <td class="text-center"><strong>Tổng tiền</strong></td>
                                    <td class="text-center"><strong>Trạng thái</strong></td>
                                    <td class="text-center">Ngày đặt</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1@endphp
                                @foreach ($bills as $item)
                                <tr>
                                    <td>{{ $i ++ }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($bill_detail as $it)
                                                <li>{{ $it->product_name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($bill_detail as $it)
                                                <li>{{ number_format($it->price, 0, ',','.') }} đ</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($bill_detail as $it)
                                                <li>{{ $it->product_promotion }} %</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($bill_detail as $it)
                                                <li>{{ $it->quantity }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ number_format($item->total, 0, ',','.') }} đ</td>
                                    <td>
                                        @if ($item->status >0)
                                        Đã thanh toán
                                        @else
                                        Chưa thanh toán
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        $(".changePassword").change(function () {
            console.log('hah')
        var parent = $( this ).closest('.form-group');
            parent.parent().find('.form-group').find('input[type="password"]').prop('disabled', function(i, v) { return !v; });
        });
    });
</script>
@endpush

