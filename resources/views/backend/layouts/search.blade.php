{{ Form::open(['method' => 'GET',$route]) }}
    {{ Form::search('key', null, ['class'=>'form-control','aria-controls'=>'sampleTable', 'placeholder' => 'Search for...', 'style' => 'width:77%;']) }}
        <span class="input-group-btn">
            {{ Form::button('Go!', ['type' => 'submit', 'class' => 'btn btn-default'] ) }}
        </span>
{{ Form::close() }}
