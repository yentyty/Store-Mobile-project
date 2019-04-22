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
                                    <td class="text-center"><strong>Hóa đơn</strong></td>
                                    <td class="text-center"><strong>Địa chỉ nhận hàng</strong></td>
                                    <td class="text-center"><strong>Tổng tiền</strong></td>
                                    <td class="text-center"><strong>Ngày đặt</strong></td>
                                    <td class="text-center"><strong>Chi tiết</strong></td>
                                    <td class="text-center"><strong>Trạng thái</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1@endphp
                                @foreach ($bills as $item)
                                <tr>
                                    <td>{{ $i ++ }}</td>
                                    <td>
                                        {{ $item->address }}
                                    </td>
                                    <td>{{ number_format($item->total, 0, ',','.') }} đ</td>
                                    <td>
                                        {{ $item->created_at }}
                                    </td>
                                    <td>
                                        <a href="{{route('fe.bill_detail', $item->id)}}" style="color:blue;">Xem Chi tiết</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                        Chưa thanh toán
                                        <a
                                        href="javascript:void(0)"
                                        onclick="if(confirm('Bạn muốn huỷ đơn hàng này?')){location.href='{{route('fe.bill.cancel', $item->id)}}'}"
                                        class="btn btn-danger" style="margin-left:1em; border: 1px solid red; border-radius:5%;">Huỷ đơn hàng</a>
                                        @elseif ($item->status == 1)
                                        <p style="color:green; font-weight: bold;">Đã thanh toán</p>
                                        @elseif ($item->status == 2)
                                        <p style="color:red; font-weight: bold;">Đơn hàng đã hủy</p>
                                        @endif
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

