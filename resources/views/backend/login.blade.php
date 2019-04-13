<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Mobile Store</title>
    <link href="backend/admin-asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/admin-asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="backend/admin-asset/nprogress/nprogress.css" rel="stylesheet">
    <link href="backend/admin-asset/animate.css/animate.min.css" rel="stylesheet">
    <link href="backend/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
    <div>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible messag" style="width: 20em;float: right;margin-right: 3em;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('msg') }}
            </div>
        @endif
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">

            <div class="animate form login_form">
                <section class="login_content">

                    {{ Form::open(['method' => 'POST', 'route' => ['be.postLogin'], 'class' => 'login-form']) }}
                        <h1>Login Form</h1>
                        <div>
                            {{ Form::email('email', '', ['placeholder'=>'Email', 'class'=>'form-control', 'autofocus'=>'']) }}
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $error)
                                    <span class="style-span create-user style-request" style="color:red; margin-left:-12em;">* {{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            {{ Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control']) }}
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                    <span class="style-span create-user style-request" style="color:red; margin-left:-14em;">* {{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            {{ Form::button(
                                '<i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN',
                                ['class' => 'btn btn-primary btn-block',
                                'type' => 'submit'])
                            }}
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br/>
                            <div>
                                <h1>
                                    <i class="fa fa-paw"></i> Mobie Store !!!
                                </h1>
                            </div>
                        </div>
                    {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>
    <script src="backend/admin-asset/jquery/dist/jquery.min.js"></script>
    <script>
        $("div.alert-success").delay(4000).slideUp();
    </script>
</body>
</html>
