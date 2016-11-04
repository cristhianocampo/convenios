<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/stylelogin.css') }}">
</head>
<body>
<div class="container-fluid">        
    <header class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- icono mostrado en modo móvil-->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/home')}}"><img src="{{asset('media/img/logounan.png')}}" alt="Logo UNAN" id="navlogo"></a>
                </div>

                <!-- Contenido del navbar -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="portafolio.php"></a>
                        </li>

                        <li><a href="">Inicio</a></li>                
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    </header>

    <section class="row log">
        <div class="container">
        <div class="col-md-6 col-md-offset-3 color">
        <form class="" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label eti">Correo electrónico</label>
                <div class="">
                    <input id="email" type="email" class="form-control text input-lg" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label eti">Contraseña</label>
                <div class="">
                    <input id="password" type="password" class="form-control text input-lg" name="password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Recuérdame
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i> Login
                    </button><br>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="p">Olvide mi contraseña <a href="{{ url('/password/reset') }}">Entra Aquí</a></label>
                    </div>                    
                </div>
            </div>
        </form> 
        </div>   
        </div>
        <h2 class="blanco text-center">¡A la libertad por la universidad!</h2>
    </section>

    </div>
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
</body>
</html>

