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
                        'route' => ['offer.update', $offer->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('title', $offer->title, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import title', 'style' => 'padding-left:4em']) }}
                        <span class="form-control-feedback left" style="width:3em; color:#73879C;">Title *</span>
                        @if ($errors->has('title'))
                            @foreach ($errors->get('title') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{  Form::select(
                            'factory_id',
                            $factory->pluck('name', 'id'),
                            $offer->factory_id,
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
                    <div class="form-group">
                        {{ Form::label('image', 'Image *: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            @if(!empty($offer->image))
                            <img src="uploads/images/offers/{{ $offer->image}}" width="570" height="230" alt="Image offers" id="img">
                            <br>
                            @else
                            <img src="" width="570" height="230" alt="Image offers" id="img" style="display: none">
                            @endif
                            <br>
                            {{ Form::file('image', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a picture of the correct size min-width: 280 and min-height:140.... ) </p>
                        </div>
                        @if ($errors->has('image'))
                            @foreach ($errors->get('image') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::textarea('description', $offer->description, ['class' => 'form-control resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
                        </div>
                        @if ($errors->has('description'))
                            @foreach ($errors->get('description') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <h2 class="style_h2_news">Content</h2>
                    <div class="x_content">
                        {{ Form::textarea('content', $offer->content, ['class' => 'form-control ckeditor resizable_textarea form-control', 'placeholder' => 'Import description', 'rows' => '4', 'cols' => '50']) }}
                    </div>
                    @if ($errors->has('content'))
                            @foreach ($errors->get('content') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    <div class="form-group">
                        <div class="col-md-12 text-center mt-3" style="margin-top: 3em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('offer.index')}}"
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
