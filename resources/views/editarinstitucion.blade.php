 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Institucón | Gestión</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/styleperfil.css') }}">
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
					<form method="post">					
						<h2>Gestión de perfil de institución</h2><br>
						{{ csrf_field() }}						
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" value="{{$institucion->nombreinstitucion}}" required>
						</div>
						<div class="form-group">
							<label for="tipo">Tipo:</label>
							<select class="form-control" name="tipo" required>
								<option value="" disable selected>Seleccione</option>
								<option value="Pública">Pública</option>
								<option value="Privada">Privada</option>
								<option value="Sudvencionada">Subvencionada</option>
								<option value="Gubernamental">Gubernamental</option>
								<option value="No Gubernamental">No Gubernamental</option>
								<option value="Educativa">Educativa</option>
							</select>
						</div>
						<div class="form-group">
							<label for="año">Años de Existencia:</label>
							<input type="text" class="form-control" id="nombre" placeholder="Año Existencia" name="año" name="año" value="{{$institucion->existencia}}"required>
						</div>
						<div class="form-group">
							<label for="evaluacion">Evaluación de la Planta Física:</label>
							<textarea class="form-control" name="evaluacion" value="{{$institucion->plantafisica}}" required></textarea>
						</div>

						<div class="form-group">
							<label for="numest">Numero de Estudiante:</label>
							<input type="text" class="form-control" placeholder="Numero de Estudiante" name="numest" value="{{$institucion->nestudiantes}}" required>
						</div>

						<div class="form-group">
							<label for="numdoce">Numero de Docentes:</label>
							<input type="text" class="form-control" placeholder="Numero de Docente" name="numdoce" value="{{$institucion->ndocentes}}" required>
						</div>

						<div class="form-group">
							<label for="carre">Carreras que Ofrece:</label>
							<textarea class="form-control" placeholder="Carreras" name="carrera" value="{{$institucion->carreras}}" required></textarea>
						</div>

						<button type="submit" class="btn btn-primary">Modificar</button>
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