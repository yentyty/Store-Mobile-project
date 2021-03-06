@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list service</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('service.create') }}">
                    <i class="fa fa-plus"></i> Create Service
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('service.index')])
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
                    <th style="width: 25%;">Title</th>
                    <th style="width: 50%;">Description</th>
                    <th style="width: 5%;">Icon </th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $key => $service)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        @if (!empty($service->icon))
                            <img width="100%" src="uploads/images/services/{{ $service->icon }}">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('service.edit', ['id'=>$service->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('service.destroy', ['id'=>$service->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $service->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['service.destroy',$service->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$service->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $services->links() }}
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
