@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list factories</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('factory.create') }}">
                    <i class="fa fa-plus"></i> Create factories
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('factory.index')])
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
                    <th style="width: 3%; text-align: center">#</th>
                    <th style="width: 50%; text-align: center;">Name</th>
                    <th style="width: 15%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($factories as $key => $factory)
                <tr role="row" class="odd">
                    <td style="text-align:center;">{{ $key + 1 }}</td>
                    <td style="text-align:center;">{{ $factory->name }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('factory.edit', ['id'=>$factory->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('factory.destroy', ['id'=>$factory->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $factory->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['factory.destroy',$factory->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$factory->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $factories->links() }}
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
