@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list informations</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('information.create') }}">
                    <i class="fa fa-plus"></i> Create informations
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('information.index')])
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
                    <th style="width: 5%;">#</th>
                    <th style="width: 30%;">Title</th>
                    <th style="width: 50%;">Content</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($informations as $key => $information)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ str_limit($information->title,40) }}</td>
                    <td>{{ strip_tags(str_limit($information->content,100)) }}</td>
                    <td>
                        <a
                            href="{{ route('information.show', ['id'=>$information->id]) }}"
                            class="btn btn-info"
                        >
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('information.edit', ['id'=>$information->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('information.destroy', ['id'=>$information->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $information->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {{ Form::open([
                                'method' => 'DELETE',
                                'route' => ['information.destroy',$information->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$information->id"
                            ]) }}
                            {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
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
