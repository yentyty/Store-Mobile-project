@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form <small>Create user</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'POST',
                        'route' => 'introduce.store',
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('name', null, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import name', 'style' => 'padding-left:5em']) }}
                        <span class="form-control-feedback left" style="width:4em; color:#73879C;">Name *</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'inputSuccess3', 'placeholder' => 'Import address', 'style' => 'padding-right:5em']) }}
                        <span class="form-control-feedback right style-span" style="width: 4.5em; margin-right: 0em; padding-left: 0em;">Address *</span>
                        @if ($errors->has('address'))
                            @foreach ($errors->get('address') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::email('email','',['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess4', 'placeholder' => 'Import Email', 'style' => 'padding-left:5em']) }}
                        <span class="form-control-feedback left" style="width:4em; color:#73879C;">Email</span>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::number('phone','',['class' => 'form-control', 'id' => 'inputSuccess5', 'placeholder' => 'Import Phone', 'style' => 'padding-right:5em']) }}
                        <span class="form-control-feedback right style-span" style="width: 4.5em; margin-right: 0em; padding-left: 0em;">Phone</span>
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group" style="margin-left:-6em;">
                        <div class="col-md-12 text-center mt-3" style="margin-top: 3em;">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3 text-center">
                                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:-12em;'] ) }}
                                </div>
                                <div class="col-lg-3 text-center">
                                    <a
                                    href="{{route('introduce.index')}}"
                                    class="btn btn-warning"
                                >
                                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                                </a>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                {{  Form::close()  }}
            </div>
        </div>

    </div>
</div>
@endsection
