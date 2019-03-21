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
                        'method' => 'PUT',
                        'route' => ['introduce.update', $introduce->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('name', $introduce->name, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import name', 'style' => 'padding-left:5em']) }}
                        <span class="form-control-feedback left" style="width:4em; color:#73879C;">Name *</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('address', $introduce->address, ['class' => 'form-control', 'id' => 'inputSuccess3', 'placeholder' => 'Import address', 'style' => 'padding-right:5em']) }}
                        <span class="form-control-feedback right style-span" style="width: 4.5em; margin-right: 0em; padding-left: 0em;">Address *</span>
                        @if ($errors->has('address'))
                            @foreach ($errors->get('address') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::email('email', $introduce->email,['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess4', 'placeholder' => 'Import Email', 'style' => 'padding-left:5em']) }}
                        <span class="form-control-feedback left" style="width:4em; color:#73879C;">Email *</span>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::number('phone', $introduce->phone,['class' => 'form-control', 'id' => 'inputSuccess5', 'placeholder' => 'Import Phone', 'style' => 'padding-right:5em']) }}
                        <span class="form-control-feedback right style-span" style="width: 4.5em; margin-right: 0em; padding-left: 0em;">Phone *</span>
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group" style="margin-left:-6em;">
                        <div class="col-md-9 col-sm-9 col-md-offset-5" style="margin-top:1em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('introduce.index')}}"
                                class="btn btn-warning"
                            >
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancle
                            </a>
                        </div>
                    </div>
                {{  Form::close()  }}
            </div>
        </div>

    </div>
</div>
@endsection
