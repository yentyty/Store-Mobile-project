@extends('backend.layouts.master')

@section('content')
<div class="right_col" role="main" style="min-height: 1381px;">
    <div class="">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('user.index') }}">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="count">{{ $users }}</div>
                        <h3>Users</h3>
                        <p>All user from the store.</p>
                    </div>
                </a>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('bill.index') }}">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-comments-o"></i>
                        </div>
                        <div class="count">{{ $bills }}</div>
                        <h3>Bills</h3>
                        <p>All customer orders</p>
                    </div>
                </a>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('product.index') }}">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-sort-amount-desc"></i>
                        </div>
                        <div class="count">{{ $products }}</div>
                        <h3>Products</h3>
                        <p>All products from the store.</p>
                    </div>
                </a>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('news.index') }}">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <div class="count">{{ $news }}</div>
                        <h3>News</h3>
                        <p>News list</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="x_title">
                <div class="filter">
                    <div
                        id="reportrange"
                        class="pull-right"
                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"
                    >
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>February 11, 2019 - March 12, 2019</span>
                        <b class="caret"></b>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Table Comment <small> List Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a
                                class="dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-expanded="false"
                            >
                                <i class="fa fa-wrench"></i>
                            </a>
                        </li>
                        <li>
                            <a class="close-link">
                                <i class="fa fa-close"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled top_profiles scroll-view">
                        @foreach ($comments as $item)
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    @if (isset($item->user->avatar))
                                        <img src="uploads/images/users/{{ $item->user->avatar }}" width="150%" style="border-radius: 50%;width: 193%;margin-left: -0.84em;margin-top: -0.60em;">
                                    @else
                                        <i class="fa fa-user aero"></i>
                                    @endif
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">{{ $item->user->username }}</a>
                                    <p>
                                        <strong>
                                            @if ($item->status == 0)
                                            Chưa xem
                                            @elseif ($item->status == 1)
                                                Đã xem
                                            @endif
                                        </strong>
                                        <br>
                                        {{ $item->content }}
                                    </p>
                                    <p>
                                        <small>{{ $item['created_at']->diffForHumans() }}, {{ date_format($item['updated_at'], 'd-m-Y') }}</small>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Table Contacts <small> List Contacts</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a
                                class="dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-expanded="false"
                            >
                                <i class="fa fa-wrench"></i>
                            </a>
                        </li>
                        <li>
                            <a class="close-link">
                                <i class="fa fa-close"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach ($contacts as $contact)
                    <article class="media event">
                        <a class="pull-left date" style="width:5em;">
                            <p class="month">{{ date('d-m', strtotime($contact->create_at)) }}</p>
                            <p class="day">{{ date('Y', strtotime($contact->create_at)) }}</p>
                        </a>
                        <div class="media-body">
                            <a class="title">{{ $contact->name }}</a>
                            <p>
                                @if ($contact->status == 0)
                                    Chưa xem
                                @elseif ($contact->status == 1)
                                    Đã xem
                                @endif
                            </p>
                            <p>{{ $contact->email }}</p>
                            <p>{{ str_limit($contact->content, 30) }}</p>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Table Roles <small> Show list Roles</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                                <a
                                    class="dropdown-toggle"
                                    data-toggle="dropdown"
                                    role="button"
                                    aria-expanded="false"
                                >
                                    <i class="fa fa-wrench"></i>
                                </a>
                            </li>
                        <li>
                            <a class="close-link">
                                <i class="fa fa-close"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach ($roles as $role)
                        <article class="media event">
                            <a class="pull-left border-blue profile_thumb">
                                <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                                <p class="title style-role-name">{{ $role->name }}</p>
                                <p>{{ $role->created_at }}</p>
                                <p>{{ $role->name }} perform certain functions in the store.</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
