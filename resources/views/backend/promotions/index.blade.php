@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list promotions</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('promotion.create') }}">
                    <i class="fa fa-plus"></i> Create informations
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('promotion.index')])
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
                    <th style="width: 3%;text-align: center;">#</th>
                    <th style="width: 50%; text-align: center;">Percent (%)</th>
                    <th style="width: 5%;">Status</th>
                    <th style="width: 15%; text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promotions as $key => $promotion)
                <tr role="row" class="odd">
                    <td style="text-align:center;">{{ $key + 1 }}</td>
                    <td style="text-align:center;">{{ $promotion->percent }}</td>
                    <td class = "btn-changstatus-{{$promotion->id}}">
                        <button
                            class="btn btn-{{$promotion->status == 1 ? 'success' : 'warning'}}"
                            onclick="changeStatus({{ $promotion->id }})"
                            style="width:100%;"
                        >
                            {{$promotion->status == 1 ? 'ON' : 'OFF '}}
                        </button>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route('promotion.edit', ['id'=>$promotion->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('promotion.destroy', ['id'=>$promotion->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $promotion->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['promotion.destroy',$promotion->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$promotion->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $promotions->links() }}
        </div>
    </div>
</div>
@endsection

@push('script')
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
            url: "{{ route('promotion.changestatus') }}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data.status)
                var	button = "";
                if (data.status) {
                    button = "<button class='btn btn-success' style='width:100%' onclick='changeStatus("+ data.id +")'> ON </button>";
                } else {
                    button = "<button class='btn btn-warning' style='width:100%' onclick='changeStatus("+ data.id +")'> OFF </button>";
                }
                $('.btn-changstatus-' + data.id).empty();
                $('.btn-changstatus-' + data.id).append(button);
                notification();
            },
        });
    }
</script>
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
@endpush
