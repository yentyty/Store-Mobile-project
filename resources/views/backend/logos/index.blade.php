@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list logos</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('logo.create') }}">
                    <i class="fa fa-plus"></i> Create Logo
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('logo.index')])
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
                    <th style="width: 50%; text-align: center;">Title</th>
                    <th style="width: 20%; text-align: center;">Image </th>
                    <th style="width: 27%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logos as $key => $logo)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td style="text-align: center;">{{ $logo->name }}</td>
                    <td style="text-align: center;">
                        @if (!empty($logo->image))
                            <img width="100%" src="uploads/images/logos/{{ $logo->image }}">
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <a
                            href="{{route('logo.destroy', ['id'=>$logo->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $logo->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['logo.destroy',$logo->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$logo->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $logos->links() }}
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
@endpush
