@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form <small>Create Service</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'POST',
                        'route' => 'service.store',
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name *:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'style' => 'width:15em;']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('name', null, ['class' => 'form-control resizable_textarea form-control', 'placeholder' => 'Import name']) }}
                        </div>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user style-request" style="margin-left:15em;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description * :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12', 'style' => 'width:15em;']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::textarea('description', null, ['class' => 'form-control resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
                        </div>
                        @if ($errors->has('description'))
                            @foreach ($errors->get('description') as $error)
                                <span class="style-span create-user style-request" style="margin-left:15em;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group" style="width:60em;">
                        {{ Form::label('icon', 'Icon *: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <img src="" width="8%" alt="Image Cover" id="img" style="display: none;">
                            {{ Form::file('icon', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a icon of the correct size max-width: 100 and max-height:100.... ) </p>
                        </div>
                        @if ($errors->has('icon'))
                            @foreach ($errors->get('icon') as $error)
                                <span class="style-span create-user style-request" style="margin-left:15em;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center mt-3" style="margin-top: 3em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('service.index')}}"
                                class="btn btn-warning"
                            >
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                {{  Form::close()  }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#icon").change(function() {
                readURL(this);
            });
        });
    </script>
@endpush

