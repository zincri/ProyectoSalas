<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
    <!-- META SECTION -->
    <title>Salas ITTG</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <div class="login-container lightmode">

        <div class="login-box animated fadeInDown">
            <div class="login-logo">
            </div>
            <div class="login-body">
                <div class="login-title"><strong>Inicia sesión</strong> con tu cuenta</div>
                <form action="{{route('login')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <div class="col-md-12">
                            <input type="text" id="email" name="email" class="form-control" placeholder="E-mail"
                                value="{{old('email')}}" />
                            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                        <div class="col-md-12">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" value="{{old('password')}}" />
                            {!! $errors->first('password','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <div class="col-md-6">
                                    <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                                </div> -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-block">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>

                <a href="{{ url('registrar')}}">
                    <p><small>Registrar Usuario</small><br /></p>
                </a>
            </div>
            <div class="login-footer">
                <div class="pull-left">
                    &copy; 2019 - Zincri M, Jhoana D., ... .
                </div>

            </div>
        </div>

    </div>

</body>

</body>

</html>