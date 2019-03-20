@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list news</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('news.create') }}">
                    <i class="fa fa-plus"></i>Create News
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('news.index')])
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
                    <th style="width: 15%;">Title</th>
                    <th style="width: 10%;">Creator</th>
                    <th style="width: 20%;">Description</th>
                    <th style="width: 15%;">Cover Image</th>
                    <th style="width: 11%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $key => $new)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ str_limit($new->title,30)}}</td>
                    <td>{{ $new->user->name }}</td>
                    <td>{{ str_limit(strip_tags($new->description,50))}}</td>
                    <td>
                        @if (!empty($new->cover_image))
                            <img width="100%" src="uploads/images/news/{{ $new->cover_image }}">
                        @endif
                    </td>
                    <td>
                        <a
                            href="{{ route('news.show', ['id'=>$new->id]) }}"
                            class="btn btn-info"
                        >
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('news.edit', ['id'=>$new->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('news.destroy', ['id'=>$new->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $new->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['news.destroy',$new->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$new->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $news->links() }}
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
