{{ Form::open(['method' => 'GET', 'url' => '/search', 'class' => 'input-group search-bar', 'id' => 'search']) }}
    {{ Form::search('key', null, ['class'=>'input-group-field st-default-search-input search-text',
    'aria-controls'=>'sampleTable', 'placeholder' => 'Nhập nội dung tìm kiếm', 'style' => 'padding-left: 1em;']) }}
    <span class="input-group-btn">
        {{ Form::submit('tìm kiếm', [ 'class' => 'btn icon-fallback-text']) }}
        </span>
{{ Form::close() }}
