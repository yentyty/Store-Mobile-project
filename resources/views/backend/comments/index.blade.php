@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list comments</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('comment.index')])
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
                    <th style="width: 20%;">Commentator</th>
                    <th style="width: 27%;">Product</th>
                    <th style="width: 30%;">Content</th>
                    <th style="width: 5%;">Status</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $key => $comment)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->product->name }}</td>
                    <td>{{ str_limit(strip_tags($comment->content),50) }}</td>
                    <td class = "btn-changstatus-{{ $comment->id }}">
                        <button
                            class="btn btn-{{ $comment->status == 1 ? 'success' : 'warning' }}"
                            onclick="changeStatus({{ $comment->id }})"
                            style="width:100%;"
                        >
                            {{ $comment->status == 1 ? 'Allow' : 'Disallow' }}
                        </button>
                    </td>
                    <td>
                        <a
                            href="{{route('comment.destroy', ['id'=>$comment->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $comment->id }}, event)"
                        >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['comment.destroy',$comment->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$comment->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $comments->links() }}
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
            url: "{{ route('comment.changestatus') }}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data.status)
                var	button = "";
                if (data.status) {
                    button = "<button class='btn btn-success' style='width:100%' onclick='changeStatus("+ data.id +")'> Allow </button>";
                } else {
                    button = "<button class='btn btn-warning' style='width:100%' onclick='changeStatus("+ data.id +")'> Disallow </button>";
                }
                $('.btn-changstatus-' + data.id).empty();
                $('.btn-changstatus-' + data.id).append(button);
                notification();
            },
        });
    }
</script>
@endpush
