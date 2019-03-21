@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list banners</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('banner.create') }}">
                    <i class="fa fa-plus"></i>Create Banner
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('banner.index')])
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
                    <th style="width: 30%;">Title</th>
                    <th style="width: 40%;">Image </th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $key => $banner)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $banner->name }}</td>
                    <td>
                        @if (!empty($banner->image))
                            <img width="100%" src="uploads/images/banners/{{ $banner->image }}">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('banner.edit', ['id'=>$banner->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('banner.destroy', ['id'=>$banner->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $banner->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['banner.destroy',$banner->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$banner->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $banners->links() }}
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
