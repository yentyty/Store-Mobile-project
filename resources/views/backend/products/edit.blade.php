@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form <small>Edit product</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'PUT',
                        'route' => ['product.update', $product->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('name', $product->name, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import Name', 'style' => 'padding-left:5em']) }}
                        <span class="form-control-feedback left" style="width:4em; color:#73879C;">Name *</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{  Form::select(
                            'factory_id',
                            $factory->pluck('name', 'id'),
                            $product->factory->id,
                            ['class' => 'form-control border-input', 'style' => 'margin-right:6em'],
                            ['multiple' => true])
                        }}
                        <span class="form-control-feedback right style-span" style="width: 5.5em; margin-right: 0em; padding-left: 0em;">Factory *</span>
                        @if ($errors->has('factory_id'))
                            @foreach ($errors->get('factory_id') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                            {{ Form::number('in_stock', $product->in_stock, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess3', 'placeholder' => 'Import quantity', 'style' => 'padding-left:6em; padding-right: 0.5em;']) }}
                            <span class="form-control-feedback left" style="width:5em; color:#73879C;">Quantity *</span>
                            @if ($errors->has('in_stock'))
                                @foreach ($errors->get('in_stock') as $error)
                                    <span class="style-span create-user">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{  Form::select(
                            'promotion_id',
                            $promotion->pluck('percent', 'id'),
                            $product->promotion->id,
                            ['class' => 'form-control border-input', 'style' => 'margin-right:6em'],
                            ['multiple' => true])
                        }}
                        <span class="form-control-feedback right style-span" style="width: 6.5em; margin-right: 0em; padding-left: 0em;">Promotion *</span>
                        @if ($errors->has('factory_id'))
                            @foreach ($errors->get('factory_id') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        {{ Form::label('price', 'Price :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::number('price', $product->price, ['class' => 'form-control resizable_textarea form-control', 'placeholder' => 'Import price', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            <span class="right" style="margin-top: -2em; margin-right: 8em;">( VND )</span>
                        </div>
                        @if ($errors->has('price'))
                            @foreach ($errors->get('price') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                            {{ Form::label('color', 'Color :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                {{ Form::select(
                                    'color[]',
                                    ['Trắng'=>'Trắng', 'Đen'=>'Đen', 'Xanh'=>'Xanh', 'Đỏ'=>'Đỏ', 'Vàng'=>'Vàng'],
                                    json_decode($product->color)
                                    ,
                                    ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple', 'style' => 'width:48.5em;']
                                )
                                }}
                            </div>
                            @if ($errors->has('color'))
                                @foreach ($errors->get('color') as $error)
                                    <span class="style-span create-user style-request">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    <div class="form-group">
                        {{ Form::label('storage', 'Storage :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::number('storage', $product->storage, ['class' => 'form-control resizable_textarea form-control', 'placeholder' => 'Import storage', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                        </div>
                        @if ($errors->has('storage'))
                            @foreach ($errors->get('storage') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    @php
                        $count = count(json_decode($product->image));
                    @endphp
                    @php
                        $someArrayPic = json_decode($product->image, true);
                    @endphp
                    <div class="form-group" style="margin-right:7em; margin-top: 3em;">
                        @php $i = 0 @endphp
                        @for ($k = 0; $k < $count; $k++)
                            @php $i++ @endphp
                            {{ Form::label("pic$i", "Image $i<span class='required'>*</span> :" , ['class' => 'control-label col-sm-2'], false) }}
                            <div class="col-sm-2">
                                @if (!empty($someArrayPic))
                                    <img src="uploads/images/products/{{ $someArrayPic[$k] }}" width="200" height="200" alt="Image offers" id="img{{ $k }}">
                                    <br>
                                @else
                                    <img src="" width="200" height="200" alt="Image offers" id="img{{ $k }}" style="display: none">
                                @endif
                                <input type="file" name="image[]" class="form-control" id="pic{{ $k }}">
                                <br>
                                <p style="width:19em; margin-left:-3em;">( Please select a image of the correct size max-width: 600 and max-height:600.... ) </p>
                                @if ($errors->has('image'))
                                    <span class="style-span create-user style-request" style="margin-left: -3em;">{{ $errors->first('image') }}</span>
                                @endif
                                @if ($errors->has('image.*'))
                                    <span class="style-span create-user style-request" style="margin-left: -3em;">{{ $errors->first('image.*') }}</span>
                                @endif
                            </div>
                        @endfor
                        @if ($count < 2)
                        {{ Form::label("pic2", "Image 2<span class='required'>*</span> :" , ['class' => 'control-label col-sm-2'], false) }}
                        <div class="col-sm-2">
                            <img src="" width="200" height="200" alt="Image offers" id="img3" style="display: none">
                            <input type="file" name="image[]" class="form-control" id="pic3"></3>
                            <p style="width:19em; margin-left:-3em;">( Please select a image of the correct size max-width: 600 and max-height:600.... ) </p>
                        </div>
                        @endif
                        @if ($count < 3)
                        {{ Form::label("pic3", "Image 3<span class='required'>*</span> :" , ['class' => 'control-label col-sm-2'], false) }}
                        <div class="col-sm-2">
                            <img src="" width="200" height="200" alt="Image offers" id="img3" style="display: none">
                            <input type="file" name="image[]" class="form-control" id="pic3"></3>
                            <p style="width:19em; margin-left:-3em;">( Please select a image of the correct size max-width: 600 and max-height:600.... ) </p>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Configuration',['class' => 'control-label col-sm-offset-5', 'style'=> 'font-size: 2em;']) }}
                    </div>
                    @php $someArray = json_decode($product->description, true); @endphp
                    <div class="form-group">
                            {{ Form::label('screen', 'Screen <span class="required">*</span> :' ,['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('screen', $someArray['screen'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('screen'))
                                @foreach ($errors->get('screen') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('OS', 'Operating system <span class="required">*</span> :' ,['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('OS', $someArray['OS'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('OS'))
                                @foreach ($errors->get('OS') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('camera', 'Camera <span class="required">*</span> :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('camera', $someArray['camera'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('camera'))
                                @foreach ($errors->get('camera') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('cpu', 'CPU <span class="required">*</span> :' ,['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('cpu', $someArray['cpu'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('cpu'))
                                @foreach ($errors->get('cpu') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('ram', 'Ram <span class="required">*</span> :' ,['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::number('ram', $someArray['ram'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('ram'))
                                @foreach ($errors->get('ram') as $error)
                                    <span class="style-span create-user">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('sim', 'Sim <span class="required">*</span> :' ,['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('sim', $someArray['sim'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('sim'))
                                @foreach ($errors->get('sim') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('pin', 'Battery capacity <span class="required">*</span> :' ,['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('pin', $someArray['pin'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('pin'))
                                @foreach ($errors->get('pin') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fingerprint', 'Fingerprint <span class="required">*</span> :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'], false) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('fingerprint', $someArray['fingerprint'], ['class' => 'form-control', 'style' => 'width:45em; border-radius: 0.3em;']) }}
                            @if ($errors->has('fingerprint'))
                                @foreach ($errors->get('fingerprint') as $error)
                                    <span class="style-span create-user ">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <h2 class="style_h2_news"> Product Introduction</h2>
                    <div class="x_content">
                        {{ Form::textarea('body', $product->body, ['class' => 'form-control ckeditor resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center mt-3" style="margin-top:1em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('product.index')}}"
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

    $(document).ready(function () {
        $('a.removeImage').click(function (event) {
            event.preventDefault();

            var url = $(this).attr('href');
            // var str = $(this).attr('onclick');
            // var u = str.substr(52);
            // var url = u.split("'")[0];
            $.ajax({
                method: 'GET',
                url: url,
                success: function (response) {
                    $('#container').replaceWith(response);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            // return false;
        });
    });

    $(document).ready(function () {
        $('a.addImage').click(function (event) {
            event.preventDefault();

            var url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                success: function (response) {
                    $('#container').replaceWith(response);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            // return false;
        });
    });
    $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img0').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#pic0").change(function() {
                readURL(this);
            });
    });
    $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img1').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#pic1").change(function() {
                readURL(this);
            });
    });
    $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img2').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#pic2").change(function() {
                readURL(this);
            });
    });
    $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img3').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#pic3").change(function() {
                readURL(this);
            });
    });
</script>
@endpush
