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
                        'route' => ['news.update', $new->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('title', $new->title, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import title', 'style' => 'padding-left:4em']) }}
                        <span class="form-control-feedback left" style="width:3em; color:#73879C;">Title *</span>
                        @if ($errors->has('title'))
                            @foreach ($errors->get('title') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{  Form::select(
                            'user_id',
                            $user->pluck('name', 'id'),
                            $new->user_id,
                            ['class' => 'form-control border-input'],
                            ['multiple' => true])
                        }}
                        <span class="form-control-feedback right style-span" style="width: 4.5em; margin-right: 0em; padding-left: 0em;">User *</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        {{ Form::label('cover_image', 'Cover Image *: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            @if(!empty($new->cover_image))
                            <img src="uploads/images/news/{{ $new->cover_image}}" width="200" height="200" alt="Image Cover" id="img">
                            @else
                            <img src="" width="200" height="200" alt="Image Cover" id="img" style="display: none">
                            @endif
                            <br>
                            {{ Form::file('cover_image', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a picture of the correct size min-width: 250 and min-height:250.... ) </p>
                        </div>
                        @if ($errors->has('cover_image'))
                            @foreach ($errors->get('cover_image') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::textarea('description', $new->description, ['class' => 'form-control resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
                        </div>
                        @if ($errors->has('description'))
                            @foreach ($errors->get('description') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('content_image', 'Content Image: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            @if(!empty($new->content_image))
                            <img src="uploads/images/news/{{ $new->content_image}}" width="350" height="350" alt="Image Cover" id="image_content">
                            @else
                            <img src="" width="350" height="350" alt="Image Cover" id="image_content" style="display: none">
                            @endif
                            <br>
                            {{ Form::file('content_image', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a picture of the correct size min-width: 350 and min-height:350.... ) </p>
                        </div>
                        @if ($errors->has('content_image'))
                            @foreach ($errors->get('content_image') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <h2 class="style_h2_news">Content *</h2>
                    <div class="x_content">
                        {{ Form::textarea('content', $new->content, ['class' => 'form-control ckeditor resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
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
                                href="{{route('news.index')}}"
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
