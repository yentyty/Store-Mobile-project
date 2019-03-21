@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form <small>Create News</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'PUT',
                        'route' => ['information.update', $information->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-9 col-sm-9 col-md-offset-9 form-group has-feedback style-form" style="margin-left: 11em;">
                        {{ Form::text('title', $information->title, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import title', 'style' => 'padding-left:4em']) }}
                        <span class="form-control-feedback left" style="width:3em; color:#73879C;">Title *</span>
                        @if ($errors->has('title'))
                            @foreach ($errors->get('title') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <h2 class="style_h2_news">Content *</h2>
                    <div class="x_content">
                        {{ Form::textarea('content', $information->content, ['class' => 'form-control ckeditor resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
                    </div>
                    @if ($errors->has('content'))
                            @foreach ($errors->get('content') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-md-offset-3" style="margin-top:1em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('information.index')}}"
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
