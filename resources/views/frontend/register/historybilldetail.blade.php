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
                    <h3>Chi tiết sản phẩm đơn hàng:</h3>
                    <p>Hóa đơn gồm: <strong>{{ $bill_detail->billdetails->count() }}</strong> sản phẩm</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>#</strong></td>
                                <td class="text-center"><strong>Tên sản phẩm</strong></td>
                                <td class="text-center"><strong>Dung lượng</strong></td>
                                <td class="text-center"><strong>Màu</strong></td>
                                <td class="text-center"><strong>Giá tiền</strong></td>
                                <td class="text-center"><strong>Số lượng</strong></td>
                                <td class="text-center"><strong>Khuyến mãi</strong></td>
                                <td class="text-center"><strong>Thành tiền</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1@endphp
                            @foreach ($bill_detail->billdetails as $item)
                            <tr>
                                <td>{{ $i ++ }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_storage }}GB
                                </td>
                                <td>
                                    {{ $item->product_color }}
                                </td>
                                <td>{{ number_format($item->price, 0, ',','.') }} đ</td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>
                                    {{ $item->product_promotion }} %
                                </td>
                                <td>
                                    {{ number_format($item->amount, 0, ',','.') }} đ
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('fe.bill.history', ['id'=>Auth::user()->id]) }}" class="btn btn-primary">Quay lại</a>
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

