<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil de Convenio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{url('css/styleViewConv.css')}}">
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
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
			<section class="row gestion">
				<div class="container">
					<h3 class="titulo">Perfil del Convenio</h3>
				</div>
				<div class="col-md-12 sombra"></div>
			</section>
			<div class="row contenedor">
				<div class="col-md-10 col-md-offset-1 off">
					<form>
					<div class="row">
					@foreach($convenios as $conv)					
						<h1 class="title">{{$conv->nombreconve}}</h1><br>
					
						<div class="col-md-5 col-md-offset-1">								
							<h3>
								<b>Procedencia:</b> <span style="font-size: 0.85em;">{{$conv->procedencia}}.</span>
							</h3>
							<h3>
								<b>País:</b> <span style="font-size: 0.85em;">{{$conv->pais}}.</span>
							</h3>
							<h3>
								<b>Institución:</b> <span style="font-size: 0.85em;">{{$conv->nombreinstitucion}}.</span>
							</h3>	
							<h3>
								<b>Fecha de firma:</b> <span style="font-size: 0.85em;">{{$conv->fechafirma}}.</span>
							</h3>
							<h3>
								<b>Período de vigencia:</b> <span style="font-size: 0.85em;">De {{$conv->fi}} a {{$conv->ff}}.</span>
							</h3>
							<h3>
								<b>Tipo:</b> <span style="font-size: 0.85em;">{{$conv->tipoconve}}.</span>
							</h3>														
						</div>

						<div class="col-md-5 col-md-offset-1">										
							<h3>
								<b>Forma de renovación:</b> <span style="font-size: 0.85em;">{{$conv->frenovacion}}.</span>
							</h3>
							<h3>
								<b>Estado:</b> <span style="font-size: 0.85em;">{{$conv->nombreestado}}.</span>
							</h3>
							<h3>
								<b>Persona de enlace interna:</b> <span style="font-size: 0.85em;">{{$conv->nombreenlace}}.</span>
							</h3>
							<h3>
								<b>Persona de enlace externa:</b> <span style="font-size: 0.85em;">{{$conv->enlaceext}}.</span>
							</h3>		
						</div>
						
					</div>
					<div class="row">					
						<div class="col-md-10 col-md-offset-1">	
							<h3>
								<b>Objetivo:</b>
							</h3>
							<h3>
								<span style="font-size: 0.85em;">{{$conv->objetivo}}.</span>
							</h3>

							<h3>
								<b>Descripción:</b>
							</h3>
							<h3>
								<span style="font-size: 0.85em;">{{$conv->descripcion}}.</span>			
							</h3>
							
							<h3>
								<b>Beneficio a corto plazo:</b>
							</h3>
							<h3>
								<span style="font-size: 0.85em;">{{$conv->beneficioscp}}.</span>
							</h3>

							<h3>
								<b>Beneficio a largo plazo:</b>
							</h3>
							<h3>
								<span style="font-size: 0.85em;">{{$conv->beneficioslp}}.</span>
							</h3>

							<h3>
								<b>Comentario:</b>
							</h3>
							<h3>
								<span style="font-size: 0.85em;">{{$conv->comentario}}.</span>
							</h3>							
						</div>								
					</div>
									
					</form>
					<div class="div"><a href="{{ asset("/convenio/$conv[archivo]") }}">Descargar archivo</a>
					@endforeach	
					</div>
					<br>
				</div>
			</div>
		</div>
	</section>
	
	<script src="{{url('js/jquery.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
	<script src="{{url('js/main.js')}}"></script>
</body>
</html>