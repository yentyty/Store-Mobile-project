@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list bills</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('bill.index')])
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="table-responsive">
        <table
            id="datatable-checkbox"
            class="table table-striped table-bordered bulk_action dataTable no-footer jambo_table"
            role="grid"
            aria-describedby="datatable-checkbox_info"
        >
            <thead>
                <tr role="row">
                    <th style="width: 3%;">#</th>
                    <th style="width: 7%;">code Bill</th>
                    <th style="width: 10%;">Orderer</th>
                    <th style="width: 7%;">Phone</th>
                    <th style="width: 25%;">Address</th>
                    <th style="width: 10%;">Total</th>
                    <th style="width: 13%;">Order date</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $key => $bill)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->username }}</td>
                    <td>{{ $bill->phone }}</td>
                    <td>{{ $bill->address }}</td>
                    <td>{{ number_format($bill->total, 0, ',' ,'.') }}</td>
                    <td>{{ $bill->created_at }}</td>
                    <td class = "btn-changstatus-{{ $bill->id }}">
                            <button
                                class="btn btn-{{ $bill->status == 1 ? 'success' : 'warning' }}"
                                onclick="changeStatus({{ $bill->id }})"
                                style="width:100%;"
                            >
                                {{ $bill->status == 1 ? 'Đã thanh toán' : 'Chưa thanh toán ' }}
                            </button>
                        </td>
                    <td>
                        <a
                            href="{{ route('bill.show', ['id'=>$bill->id]) }}"
                            class="btn btn-info"
                        >
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('bill.destroy', ['id'=>$bill->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $bill->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                        {{ Form::open([
                            'method' => 'DELETE',
                            'route' => ['bill.destroy',$bill->id],
                            'onsubmit' => 'return confirmDelete()',
                            'id' => "form-delete-$bill->id"
                        ]) }}
                    {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $bills->links() }}
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    function deleteItem(id,e) {
        e.preventDefault();
        $('#form-delete-' + id).submit();
    }

    function confirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        }
        else {
            return false;
        }
    }
</script>
<script type="text/javascript">
    function notification() {
        $.notify({
      		title: "Update Complete : ",
      		message: "Something cool is just updated!",
      		icon: 'fa fa-check'
      	},{
      		type: "info"
      	})
    }

    function changeStatus(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('bill.changestatus') }}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data.status)
                var	button = "";
                if (data.status) {
                    button = "<button class='btn btn-success' style='width:100%' onclick='changeStatus("+ data.id +")'> Đã thanh toán </button>";
                } else {
                    button = "<button class='btn btn-warning' style='width:100%' onclick='changeStatus("+ data.id +")'> Chưa thanh toán </button>";
                }
                $('.btn-changstatus-' + data.id).empty();
                $('.btn-changstatus-' + data.id).append(button);
                notification();
            },
        });
    }
</script>
@endpush
