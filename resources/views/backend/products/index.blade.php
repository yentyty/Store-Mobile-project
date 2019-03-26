@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list products</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('product.create') }}">
                    <i class="fa fa-plus"></i> Create Product
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('product.index')])
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
                    <th style="width: 20%;">Name Product</th>
                    <th style="width: 10%;">Color</th>
                    <th style="width: 5%;">Factory</th>
                    <th style="width: 10%;">Percent (%)</th>
                    <th style="width: 5%;">Quantity</th>
                    <th style="width: 10%;">Storage</th>
                    <th style="width: 20%;">Price ( VND )</th>
                    <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr role="row" class="odd">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <ul>
                        @foreach (json_decode($product->color) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>{{ $product->factory->name }}</td>
                    <td>{{ $product->promotion->percent }}</td>
                    <td>{{ $product->in_stock }}</td>
                    <td>{{ $product->storage }}</td>
                    <td> {{number_format($product->price, 0, ',' ,'.')}}</td>
                    <td>
                        <a
                            href="{{ route('product.show', ['id'=>$product->id]) }}"
                            class="btn btn-info"
                        >
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('product.edit', ['id'=>$product->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('product.destroy', ['id'=>$product->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $product->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['product.destroy',$product->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$product->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $products->links() }}
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
