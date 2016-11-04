 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte | Institución - Estado</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('css/stylefiltro.css')}}">
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
                <a class="navbar-brand" href="{{url('/home')}}"><img src="{{url('media/img/logounan.png')}}" alt="Logo UNAN" id="navlogo"></a>
            </div>

            <!-- Contenido del navbar -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">                    
                    <li><a href="{{url('convenio/mostrar')}}">Regresar</a></li>					        
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
				<div class="col-md-4 col-md-offset-4 cont">
					<form method="post" action="{{url('/convenio/reporte/institucion-estado')}}">
						{{ csrf_field() }}
						<h2>Generar Reporte</h2>

						<div class="form-group">
							<label for="intitucion">Institución</label>
							<select class="form-control" name="institucion" required>
								<option value="" disabled selected>Seleccione</option>
							@foreach($institucion as $ins)
								<option value="{{$ins->idinstitucion}}">{{$ins->nombreinstitucion}}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="estado">Estado</label>
							<select class="form-control" name="estado" required>
								<option value="" disabled selected>Seleccione</option>
							@foreach($estado as $es)
								<option value="{{$es->idestado}}">{{$es->nombreestado}}</option>
							@endforeach
							</select>
						</div>

						<button type="submit" class="btn btn-primary">Buscar</button>
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
	<script src="{{url('js/jquery.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
	<script src="{{url('js/main.js')}}"></script>

</body>
</html>