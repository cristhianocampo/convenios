<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de gesttion de convenios</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/styleindex.css') }}">
</head>
<body>
	<div class="container-fluid">
		<header class="row">
			<nav class="navbar navbar-inverse navbar-static-top">
			  	<div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				     	 </button>
				     	 <a class="navbar-brand" href="/home"><img src="{{asset('media/img/logounan.png')}}" alt="Logo UNAN" id="navlogo"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			      
				      <ul class="nav navbar-nav navbar-right">
					        <li class="active1"><a href="{{url('/home')}}">Inicio</a></li>				@if (Auth::guest())		        
					        <li><a href="{{ url('/login') }}">Login</a></li>
					        @else
					        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                <li><a href="{{ url('/convenio/mostrar') }}"><i class="fa fa-btn fa-sign-out"></i>Gestión de convenios</a></li>
                            </ul>
                        </li>
                    @endif
					        <li class="dropdown">
					        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ayuda<span class="caret"></span></a>
					        	<ul class="dropdown-menu">
						            <li><a href="#">Crear una cuenta</a></li>
						            <li><a href="#">Registrar un nuevo convenio</a></li>
						            <li><a href="#">Visualizar y monitorear convenios</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="{{url('http://www.ensim16.com/index.html')}}">¿Quiénes somos?</a></li>
					          	</ul>
					        </li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</header>

		<section class="row">			
			<div class="col-md-12 sistema">
				<h1>Sistema de seguimiento a convenios de UNAN-Managua</h1>
			</div>

			<div class="col-md-12 sombra"></div>			
		</section>

		<section class="row">		
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
					    <img src="media/img/imagen7.jpg" alt="..." class="imgcar img-responsive">
					    <div class="carousel-caption">
					   	</div>
				    </div>

				    <div class="item">
					    <img src="media/img/imagen8.png" alt="..." class="imgcar img-responsive">
					    <div class="carousel-caption">
					    </div>
				    </div>
			     
				    <div class="item">
					    <img src="media/img/imagen9.jpg" alt="..." class="imgcar img-responsive">
					    <div class="carousel-caption">   
					    </div>
				    </div>			       
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>
			</div>
		</section><br><br><br>

		<section class="row">
			<div class="col-md"></div>
			<div class="visible-lg visible-md col-md-4 col-sm-6 col-xm-2">
				<img src="media/img/imagen10.png" alt="" class="imagen1">
			</div>

			<div class="col-xs-12 col-sm-6 col-md-8 contenido">
		        <h1 class="titulo">Actualizando la manera en que se registra la información</h1>
		        <p class="texto">
		        	El <strong>Sistema de Gestión de Convenios </strong>te permite registrar la información en un estilo moderno, utilizando un sistema al cual siempre podrás tener acceso sin importar dónde te encuentres.
		        </p>
      		</div>
		</section>

		<section class="row">
			<div class="col-xs-12 col-sm-6 col-md-8 contenido1">
	      	<h1 class="titulo">Una manera más óptima de compartir la información</h1>
	      	<p class="texto">Todos los usuarios o ejecutivos que tengan acceso al sitio web podrán consultar información de los convenios sin importar la ubicación geográfica en la que se encuentren, ni la hora en que realicen la consulta.</p>
	      	</div>
	      	<div class="visible-lg visible-md col-md-2 col-sm-5">
	      		<img src="media/img/imagen11.png" alt="" class="imagen1">
	      	</div>     
		</section><br><br><br>
 		
 		<footer class="row text-center">
			<h3 class="blanco">¡A la libertad por la universidad!</h3>
		</footer>

	</div>

	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/main.js') }}"></script>
</body>
</html>