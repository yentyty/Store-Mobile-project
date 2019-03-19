<div class="modal" id="myModa{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div
                    class="col-md-12 lead"
                    style=" padding-left:37px;font-weight:bold;margin-bottom: -20px;"
                >
                    User profile
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        style="padding-right:20px;"
                    >
                        &times;
                    </button>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    @if(!empty($user->avatar))
                        <img
                            class="avatar"
                            style="vertical-align: middle; width:150px; height:150px; border-radius:50%; margin-top: 10px; margin-left: 10px;"
                            src="uploads/images/users/{{ $user->avatar }}"
                        >
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="only-bottom-margin">
                                <em>{{$user['username']}}</em>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="text-muted">Full Name: </span>{{ $user['name'] }}
                            <br>
                            <span class="text-muted">Gender: </span>
                            @if ($user['gender'] == 1)
                                Nam
                            @elseif ($user['gender'] == 2)
                                Nữ
                            @endif
                            <br>
                            <span class="text-muted">Birthday: </span>{{ $user['birthday'] }}
                            <br>
                            <span class="text-muted">Email: </span>{{ $user['email'] }}
                            <br>
                            <span class="text-muted">Phone: </span>{{ $user['phone'] }}
                            <br>
                            <span class="text-muted">Address: </span> {{ $user['address'] }}
                            <br>
                            <span class="text-muted">Role: </span>
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
                            <br>
                            <br>
                            <small class="text-muted">Created: {{ $user['created_at'] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
