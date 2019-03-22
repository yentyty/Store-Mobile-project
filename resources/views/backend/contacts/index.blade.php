@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list contacts</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('contact.index')])
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
                    <th style="width: 20%;">Name</th>
                    <th style="width: 27%;">Email</th>
                    <th style="width: 30%;">Content</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $key => $contact)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ str_limit(strip_tags($contact->content),50) }}</td>
                    <td class = "btn-changstatus-{{ $contact->id }}">
                        <button
                            class="btn btn-{{ $contact->status == 1 ? 'warning' : 'success' }}"
                        >
                            {{$contact->status == 1 ? 'Read' : 'Unread '}}
                        </button>
                    </td>
                    <td>
                        <a
                            href="backend/contacts/index/{{ $contact->id }}"
                            onclick="changeStatus({{ $contact->id }})"
                            class="btn btn-info"
                            data-toggle="modal"
                            data-target="#myModa{{ $contact->id }}"
                        >
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('contact.destroy', ['id'=>$contact->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $contact->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['contact.destroy',$contact->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$contact->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @include('backend.contacts.detail')
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $contacts->links() }}
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
    function changeStatus(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{route('contact.changestatus')}}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data.status)
                var	button = "";
                if (data.status) {
                    button = "<button class='btn btn-warning'> Read </button>";
                } else {
                    button = "<button class='btn btn-success'> Unread </button>";
                }
                $('.btn-changstatus-' + data.id).empty();
                $('.btn-changstatus-' + data.id).append(button);

            },
        });
    }
</script>
@endpush
