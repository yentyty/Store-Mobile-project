@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Edit user</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
        <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'PUT',
                        'route' => ['user.update', $user->id],
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('username', $user->username, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import user name']) }}
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        <span class="form-control-feedback left style-span">*</span>
                        @if ($errors->has('username'))
                            @foreach ($errors->get('username') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'inputSuccess3', 'placeholder' => 'Import full name']) }}
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        <span class="form-control-feedback right style-span">*</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::email('email',$user->email,['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess4', 'placeholder' => 'Import Email']) }}
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        <span class="form-control-feedback left style-span">*</span>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::number('phone',$user->phone,['class' => 'form-control', 'id' => 'inputSuccess5', 'placeholder' => 'Import Phone']) }}
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        <span class="form-control-feedback right style-span">*</span>
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('birthday', 'Birthday :', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::date('birthday', $user->birthday, ['class' => 'date-picker form-control col-md-7 col-xs-12', 'placeholder' => 'Import Birthday']) }}
                        </div>
                        @if ($errors->has('birthday'))
                            @foreach ($errors->get('birthday') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                            {{ Form::label('gender', 'Gender:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="form-check">
                                    @if ($user->gender == 1)
                                        <label style="padding-left:25px;">
                                            {{ Form::radio('gender','1', true) }} Male
                                        </label>
                                        <label style="padding-left:25px;">
                                            {{ Form::radio('gender','2', false) }} Female
                                        </label>
                                    @elseif ($user->gender == 2)
                                        <label style="padding-left:25px;">
                                            {{ Form::radio('gender','1', false) }} Male
                                        </label>
                                        <label style="padding-left:25px;">
                                            {{ Form::radio('gender','2', true) }} Female
                                        </label>
                                        @else
                                        <label style="padding-left:25px;">
                                                {{ Form::radio('gender','1') }} Male
                                            </label>
                                            <label style="padding-left:25px;">
                                                {{ Form::radio('gender','2') }} Female
                                            </label>
                                    @endif

                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        {{ Form::label('address', 'Address * :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Import address']) }}
                        </div>
                        @if ($errors->has('address'))
                            @foreach ($errors->get('address') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    {{ Form::label('password', 'Click Changepassword :', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12 ']) }}
                    {{ Form::checkbox('changePassword','',false,['class'=>'changePassword col-md-1 col-sm-1 col-xs-12', 'style' => 'margin-left:-2em;']) }}
                    <div class="clearfix"></div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password * :', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12 ']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::password('password', ['class' => 'form-control password', 'placeholder' => 'Import password', 'disabled' => '']) }}
                        </div>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('retypePassword', 'Retype Password * :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::password('passwordAgain', ['class' => 'form-control password', 'placeholder' => 'Retype Password', 'disabled' => '']) }}
                        </div>
                        @if ($errors->has('passwordAgain'))
                            @foreach ($errors->get('passwordAgain') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('role', 'Role * :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        @foreach ($roles as $role)
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="animated-checkbox" style='margin-top: 0.5em;'>
                                {{Form::checkbox('role[]', $role->id, in_array($role->id, $oldrole))}}<span class="label-text">{{$role->name}}</span>
                            </div>
                        </div>
                        @endforeach
                        @if ($errors->has('role'))
                            @foreach ($errors->get('role') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('avatar', 'Avatar: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            @if(!empty($user->avatar))
                                <img src="uploads/images/users/{{ $user->avatar}} " height="150" width="150px" alt="Avatar User" id="img">
                                @else
                                <img src="" width="150" height="150" alt="Avatar User" id="img" style="display: none">
                            @endif
                            <br>
                            {{ Form::file('avatar', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a picture of the correct size max-width:1000 * max-height:1000.... ) </p>
                        </div>
                        @if ($errors->has('avatar'))
                            @foreach ($errors->get('avatar') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-md-offset-3" style="margin-top:1em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('user.index')}}"
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
    $(document).ready(function () {
        $(".changePassword").change(function () {
        var parent = $( this ).parent();

            parent.find('input[type="password"]').prop('disabled', function(i, v) { return !v; });

        });
    });
</script>
@endpush
