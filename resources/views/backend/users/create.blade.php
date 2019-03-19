@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Create user</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_content">
                {{ Form::open
                    ([
                        'method' => 'POST',
                        'route' => 'user.store',
                        'files' => true,
                        'class' => 'form-horizontal form-label-left input_mask',
                        'enctype' => 'multipart/form-data'
                    ])
                }}
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('username', null, ['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess2', 'placeholder' => 'Import user name']) }}
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        <span class="form-control-feedback left style-span">*</span>
                        @if ($errors->has('username'))
                            @foreach ($errors->get('username') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'inputSuccess3', 'placeholder' => 'Import full name']) }}
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        <span class="form-control-feedback right style-span">*</span>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::email('email','',['class' => 'form-control has-feedback-left', 'id' => 'inputSuccess4', 'placeholder' => 'Import Email']) }}
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        <span class="form-control-feedback left style-span">*</span>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span class="style-span create-user">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback style-form">
                        {{ Form::number('phone','',['class' => 'form-control', 'id' => 'inputSuccess5', 'placeholder' => 'Import Phone']) }}
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
                            {{ Form::date('birthday', null, ['class' => 'date-picker form-control col-md-7 col-xs-12', 'placeholder' => 'Import Birthday']) }}
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
                                    <label style="padding-left:25px;">
                                        {{ Form::radio('gender','1') }} Male
                                    </label>
                                    <label style="padding-left:25px;">
                                        {{ Form::radio('gender','2') }} Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        {{ Form::label('address', 'Address * :', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Import address']) }}
                        </div>
                        @if ($errors->has('address'))
                            @foreach ($errors->get('address') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password * :', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Import password']) }}
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
                            {{ Form::password('passwordAgain', ['class' => 'form-control', 'placeholder' => 'Retype Password']) }}
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
                                {{Form::checkbox('role[]', $role->id)}}<span class="label-text">{{$role->name}}</span>
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
                            <img src="" width="150" height="150" alt="Image Room" id="img" style="display: none">
                            <br>
                            {{ Form::file('avatar', null, ['class' => 'form-control fileimage']) }}
                            <p>( Please select a picture of the correct size 1000 * 1000.... ) </p>
                        </div>
                        @if ($errors->has('avatar'))
                            @foreach ($errors->get('avatar') as $error)
                                <span class="style-span create-user style-request">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-md-offset-3" style="margin-top:1em;">
                            {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-right:5em;'] ) }}
                            <a
                                href="{{route('user.index')}}"
                                class="btn btn-warning"
                            >
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancle
                            </a>
                        </div>
                    </div>
                {{  Form::close()  }}
            </div>
        </div>
        <div class="table-responsive">
            <table
                id="datatable-checkbox"
                class="table table-striped table-bordered bulk_action dataTable no-footer jambo_table"
                role="grid"
                aria-describedby="datatable-checkbox_info"
            >
                <thead>
                    <tr role="row">
                        <th style="width: 3%;">#</th>
                        <th style="width: 10%;">UserName</th>
                        <th style="width: 20%;">Email</th>
                        <th style="width: 30%;">Address</th>
                        <th style="width: 7%;">Gender</th>
                        <th style="width: 10%;">Avatar</th>
                        <th style="width: 10%;">Role</th>
                        <th style="width: 5%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr role="row" class="odd">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            @if ($user->gender == 1)
                                Male
                            @elseif ($user->gender == 2)
                                Female
                            @endif
                        </td>
                        <td>
                            @if (!empty($user->avatar))
                                <img width="100%" src="uploads/images/users/{{ $user->avatar }}">
                            @endif
                        </td>
                        <td>
                            <?php $role = DB::table('user_roles')
                            ->join('roles', 'roles.id', '=', 'user_roles.role_id')
                            ->select('roles.*')
                            ->where('user_id', '=', $user->id)
                            ->get();?>
                            <ul>
                                @foreach ($role as $roles)
                                    <li>{{ $roles->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a
                                href="backend/users/index/{{ $user->id }}"
                                class="btn btn-info"
                                data-toggle="modal"
                                data-target="#myModa{{ $user->id }}"
                            >
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @include('backend.users.detail')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
