<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 

Route::auth(); 


//Rutas de user

Route::get('usuario/registrar', 'UsuarioController@registrar');
Route::post('usuario/registrar', 'UsuarioController@regist_user');
Route::get('/usuario/{id}/editar', 'UsuarioController@editar');
Route::post('/usuario/{id}/editar', 'UsuarioController@modificar');

Route::group(['middleware' => 'auth'], function () 
{
	Route::get('/home', 'HomeController@index');
	Route::get('/', function () 
	{
    	return view('index');
	});

	//Rutas de unidad
	Route::get('/unidad/registrar', 'UnidadController@create');
	Route::post('/unidad/registrar', 'UnidadController@store');
	Route::get('/unidad/mostrar', 'UnidadController@show');
	Route::get('/unidad/{id}/editar', 'UnidadController@edit');
	Route::post('/unidad/{id}/editar', 'UnidadController@update');
	Route::get('/unidad/busqueda', 'UnidadController@index');

	//Rutas de cargos
	Route::get('/cargo/registrar', 'CargoController@create');
	Route::post('/cargo/registrar', 'CargoController@store');
	Route::get('/cargo/mostrar', 'CargoController@show');
	Route::get('/cargo/{id}/editar', 'CargoController@edit');
	Route::post('/cargo/{id}/editar', 'CargoController@update');
	Route::get('/cargo/busqueda', 'CargoController@index');

	//Rutas de persona de enlace
	Route::get('/enlace/registrar', 'EnlaceController@create');
	Route::post('/enlace/registrar', 'EnlaceController@store');
	Route::get('/enlace/mostrar', 'EnlaceController@show');
	Route::get('/enlace/{id}/editar', 'EnlaceController@edit');
	Route::post('/enlace/{id}/editar', 'EnlaceController@update');
	Route::get('/enlace/busqueda', 'EnlaceController@index');

	//Rutas de estado
	Route::get('/estado/registrar', 'EstadoController@create');
	Route::post('/estado/registrar', 'EstadoController@store');
	Route::get('/estado/mostrar', 'EstadoController@show');
	Route::get('/estado/{id}/editar', 'EstadoController@edit');
	Route::post('/estado/{id}/editar', 'EstadoController@update');
	Route::get('/estado/busqueda', 'EstadoController@index');

	//Rutas de institucion	
	Route::get('/institucion/registrar', 'InstitucionController@crear');
	Route::post('/institucion/registrar', 'InstitucionController@guardar');
	Route::get('/institucion/mostrar', 'InstitucionController@mostrar');
	Route::get('/institucion/{id}/editar', 'InstitucionController@editar');
	Route::post('/institucion/{id}/editar', 'InstitucionController@modificar');
	Route::get('/institucion/busqueda', 'InstitucionController@index');

	//Rutas de convenio 
	Route::get('/convenio/registrar', 'ConvenioController@crear');
	Route::post('/convenio/registrar', 'ConvenioController@guardar');
	Route::get('/convenio/mostrar', 'ConvenioController@mostrar');
	Route::get('/convenio/{id}/editar', 'ConvenioController@editar');
	Route::post('/convenio/{id}/editar', 'ConvenioController@modificar');
	Route::get('/convenio/busqueda', 'ConvenioController@index');
	Route::get('/convenio/{id}/perfil', 'ConvenioController@perfil');
	Route::get('/convenio/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/archivos/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (\Storage::exists($archivo))
     {
       return response()->download($url);
       return view('new');
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
 
    });

    //Rutas de reportes de convenio
    Route::get('/convenio/reporte/institucion-vigencia', 'ConvenioController@riv');
    Route::post('/convenio/reporte/institucion-vigencia', 'ConvenioController@riv1');

    Route::get('/convenio/reporte/institucion-estado', 'ConvenioController@rie'); 
    Route::post('/convenio/reporte/institucion-estado', 'ConvenioController@rie1'); 

    Route::get('/convenio/reporte/país-firma', 'ConvenioController@rpf');
    Route::post('/convenio/reporte/país-firma', 'ConvenioController@rpf1');

    Route::get('/convenio/reporte/formaderenovacion-procedencia', 'ConvenioController@rfp');
    Route::post('/convenio/reporte/formaderenovacion-procedencia', 'ConvenioController@rfp1');

	//Ruta de usuario
	Route::get('/usuario/mostrar', 'UsuarioController@mostrar');	
	
});