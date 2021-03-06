<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enlace | Registrar</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/styleperfil.css')}}">
</head>
<body>
	<header>
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

                    <li><a href="{{url('/home')}}">Inicio</a></li>

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

	
	
	<section>
		<div class="container-fluid">
			<div class="row contenedor">
				<div class="col-md-6 col-md-offset-3 off">
					<form method="POST">
					{{ csrf_field() }}
						<h2>Registro de persona de enlace</h2><br>
					@if (session()->has('flash_notification.message'))
                            <div class="alert alert-{{ session('flash_notification.level') }}">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                {!! session('flash_notification.message') !!}
                            </div> 
                        @endif
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" required>
						</div>
						<div class="form-group">
							<label for="faculta">Faculta o Institución:</label>
							<input type="text" class="form-control" placeholder="Faculta o Institución" name="institucion" required>
						</div>
						<div class="form-group">
							<label for="telefono">Teléfono:</label>
							<input type="text" class="form-control" id="nombre" placeholder="Teléfono" name="telefono" required>
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" name="email" placeholder="E-mail" required>
						</div>

						<div class="form-group">
							<label for="tipo">Tipo:</label>
							<select class="form-control" name="tipo" required>
								<option value="" disable selected>Seleccione</option>
								<option value="Interno">Interno</option>
								<option value="Externo">Externo</option>
							</select>
						</div>

						<div class="form-group">
							<label for="Unidad">Unidad:</label>
							<select class="form-control" name="unidad" required>
								<option value="" disable selected>Seleccione</option>
								@foreach($unidad as $uni)
                                	<option value="{{$uni->idunidad}}">{{$uni->nombreunidad}}</option> 
                             	@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="carre">Cargo:</label>
							<select class="form-control" name="cargo" required>
								<option value="" disable selected>Seleccione</option>
								@foreach($cargo as $cargo)
                                	<option value="{{$cargo->idcargo}}">{{$cargo->cargo}}</option>
                             	@endforeach
							</select>
						</div>

						<button type="sudmit" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="container-fluid">
		<footer class="row text-center">
			<h3 class="blanco">¡A la libertad por la universidad!</h3>
		</footer>
	</div>

	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/main.js') }}"></script>

</body>
</html>