<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuario | Gestión</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/styleregusuer.css') }}">
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

                    <li><a href="{{url('/inicio')}}">Inicio</a></li>

                    <li class="dropdown active1">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de catálogos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{asset('/unidad/registrar')}}">Registrar unidad</a></li>
                            <li><a href="{{asset('/estado/registrar')}}">Registrar estado</a></li>                      
                            <li><a href="{{asset('/cargo/registrar')}}">Registrar cargo</a></li>                        
                            <li><a href="{{asset('/institucion/registrar')}}">Registrar institución</a></li>                        
                            <li role="separator" class="divider"></li>
                            <li><a href="{{asset('/unidad/mostrar')}}">Ver unidades registradas</a></li>    
                            <li><a href="{{asset('/estado/mostrar')}}">Ver estados registrados</a></li>    
                            <li><a href="{{asset('/cargo/mostrar')}}">Ver cargos registrados</a></li>                       
                            <li><a href="{{asset('/institucion/mostrar')}}">Ver instituciones registradas</a></li>                      
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de persona de enlace<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/enlace/registrar')}}">Registrar nueva persona de enlace</a></li>
                            <li><a href="{{url('/enlace/mostrar')}}">Ver personas de enlace registradas</a></li>       
                            <li role="separator" class="divider"></li>                      
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de convenios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/convenio/registrar')}}">Registrar nuevo convenio</a></li>
                            <li><a href="{{url('/convenio/mostrar')}}">Ver convenios registrados</a></li>       
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Generar reporte de convenio</a></li>
                        </ul>
                    </li>

                    <li class="dropdown active1">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{asset('/usuario/registrar')}}">Registrar nuevo usuario</a></li>
                            <li><a href="{{asset('/usuario/mostrar')}}">Ver usuarios registrados</a></li>                       
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Generar reporte de usuario</a></li>
                        </ul>
                    </li>
                    
                    @if (Auth::guest())             
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>                             
                            </ul>
                        </li>
                    @endif      
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    </header>
    
    <section class="row gestion">
            <div class="container">
                <h3 class="titulo">Registro de usuario</h3>
            </div>
            <div class="col-md-12 sombra"></div>
    </section></br>

    <section class="row main">
        <div class="col-md-6 col-md-offset-3 color">
            <form class="" role="form" method="POST">
            {{ csrf_field() }}
            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session('flash_notification.message') !!}
                </div> 
            @endif
            
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label eti">Nombre</label>
                <input id="name" type="text" class="form-control text input-md" name="name" value="{{$usuario->name}}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif                
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label eti">Correo electrónico</label>     
                <input id="email" type="email" class="form-control text input-md" name="email" value="{{$usuario->email}}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif                
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label eti">Contraseña</label>
                <input id="password" type="password" class="form-control text input-md" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="control-label eti">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control text input-md" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1" class="eti">Privilegio:</label>
                <select name="type" id="" class="form-control text input-md">
                    <option value="{{$usuario->type}}">{{$usuario->type}}</option>
                    <option value="" disabled>-------------------</option>
                    <option value="0">Super Administrador</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
            </div>
            
            <div class="form-group">                
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Editar                
                </button>
            </div>        
    </form>
    </div> 
</section>
<footer class="row text-center">
    <h3 class="blanco">¡A la libertad por la universidad!</h3>
</footer>
</div>
<script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
</body>
</html>



