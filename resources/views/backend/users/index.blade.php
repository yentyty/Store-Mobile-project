@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1161px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Show all list users</small></h3>
                <a class="btn btn-primary icon-btn" href="{{ route('user.create') }}">
                    <i class="fa fa-plus"></i>Create user
                </a>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        @include('backend.layouts.search', ['route' => route('user.index')])
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
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
                    <th style="width: 20%;">Address</th>
                    <th style="width: 7%;">Gender</th>
                    <th style="width: 10%;">Avatar</th>
                    <th style="width: 10%;">Role</th>
                    <th style="width: 15%;">Action</th>
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
                        <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-warning">
                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                        </a>
                        <a
                            href="{{route('user.destroy', ['id'=>$user->id])}}"
                            class="btn btn-danger"
                            onclick="deleteItem({{ $user->id }}, event)"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            {!!Form::open([
                                'method' => 'DELETE',
                                'route' => ['user.destroy',$user->id],
                                'onsubmit' => 'return confirmDelete()',
                                'id' => "form-delete-$user->id"
                            ])!!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @include('backend.users.detail')
                @endforeach
            </tbody>
        </table>
        <div style="float: right; margin-top: -1.5em; margin-right: 1em;">
                {{ $users->links() }}
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
</script>
@endpush
