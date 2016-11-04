<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<title>Enlace | Mostrar</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/stylistuser.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
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

	<div class="container-fluid">
		<section class="row gestion">
			<div class="container">
				<h3 class="titulo">Listado de Personal de Enlace</h3>
			</div>
			<div class="col-md-12 sombra"></div>
		</section>

		<section class="row main">
			<div class="container mar">
			<div class="row martop">
					<div class="col-md-12 formf">
					<br>
						<form class="form-inline" role="search" method="get" action="{{url('/enlace/busqueda')}}">
        					<div class="form-group">
          						<input type="text" class="form-control" placeholder="Nombre" name="nombre" id="kwd_search">          						
        					</div>
        					<button type="submit" class="btn btn-default">Buscar</button>
      					</form>
      				<br>
					</div>
			</div>
			<div class="row martop1">
				<div class="col-md-12 formf">						
				<br>
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-condensed" id="my-table">
							<tr class="active">
								<th>Nombre</th>
								<th>Faculta</th>								
								<th>Teléfono</th>
								<th>E-mail</th>
								<th>Tipo</th>
								<th>Unidad</th>
								<th>Cargo</th>
							</tr>
							@foreach($enlace as $worker) 
                            <tr >
                                <td><a href="{{asset("enlace/$worker[idenlace]/editar")}}">{{$worker['nombreenlace']}}</a></td>
                                <td>{{$worker['institucion']}}</td>
                                <td>{{$worker['telefono']}}</td>
                                <td>{{$worker['email']}}</td>
                                <td>{{$worker['tipo']}}</td>
                                <td>{{$worker['nombreunidad']}}</td>
                                <td>{{$worker['cargo']}}</td>
                            </tr>
                            @endforeach	
						</table>
						{!! $enlace->render() !!}
					</div>
				</div>					
			</div>	
			
		</section>

		<footer class="row text-center">
			<h3 class="blanco">¡A la libertad por la universidad!</h3>
		</footer>

	</div>

	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/main.js') }}"></script>
	<script src="{{ url('js/filtro.js') }}"></script>
</body>
</html>