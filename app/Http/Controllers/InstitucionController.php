<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Institucion;
use Laracasts\Laracasts;

class InstitucionController extends Controller
{
    public function index(Request $request)
    {
        $valores=$request->all();
        $buscar=$valores['buscar'];
        $institucion=Institucion::orderBy('idinstitucion', 'desc')                  
                  ->select('institucions.idinstitucion', 'institucions.nombreinstitucion', 'institucions.tipo', 'institucions.existencia', 'institucions.plantafisica', 'institucions.nestudiantes', 'institucions.ndocentes', 'institucions.carreras')
                  ->where('institucions.nombreinstitucion', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
        return view('mostrarinstitucion', ['institucion'=>$institucion]);
    }

    public function crear()
    {
    	return view('registroperfilinstitucion');
    }

    public function guardar(Request $request)
    {
    	$valor = $request->all();

    	$nombreinstitucion=$valor['nombre'];
    	$tipo=$valor['tipo'];
    	$existencia=$valor['año'];
    	$plantafisica=$valor['evaluacion'];
    	$nestudiantes=$valor['numest'];
    	$ndocentes=$valor['numdoce'];
	    $carreras=$valor['carrera'];  
	          

        $institucion = new Institucion();

        $institucion->nombreinstitucion=$nombreinstitucion;
    	$institucion->tipo=$tipo;
    	$institucion->existencia=$existencia;
    	$institucion->plantafisica=$plantafisica;
    	$institucion->nestudiantes=$nestudiantes;
    	$institucion->ndocentes=$ndocentes;
	    $institucion->carreras=$carreras;        
	    
        $institucion->save();

        flash("La institucion ".$institucion->nombreinstitucion." se ha registrado exitósamente", 'success');

        return redirect('/institucion/registrar');  
    }

    public function editar($id)
    {
    	$institucion = Institucion::find($id);
        return view('editarinstitucion', ['institucion'=>$institucion]);
    }

    public function modificar(Request $request, $id)
    {
    	$institucion = Institucion::find($id);

        $valor=$request->all();

        $nombreinstitucion=$valor['nombre'];
        $tipo=$valor['tipo'];
        $existencia=$valor['año'];
        $plantafisica=$valor['evaluacion'];
        $nestudiantes=$valor['numest'];
        $ndocentes=$valor['numdoce'];
        $carreras=$valor['carrera'];  

        $institucion->nombreinstitucion=$nombreinstitucion;
        $institucion->tipo=$tipo;
        $institucion->existencia=$existencia;
        $institucion->plantafisica=$plantafisica;
        $institucion->nestudiantes=$nestudiantes;
        $institucion->ndocentes=$ndocentes;
        $institucion->carreras=$carreras;        
    	       

        $institucion->save();

        return redirect('/institucion/mostrar');        
    }

    public function mostrar()
    {
        $institucion=Institucion::orderBy('idinstitucion', 'desc')                  
                  ->select('institucions.idinstitucion', 'institucions.nombreinstitucion', 'institucions.tipo', 'institucions.existencia', 'institucions.plantafisica', 'institucions.nestudiantes', 'institucions.ndocentes', 'institucions.carreras')
                  ->paginate(15);        
        return view('mostrarinstitucion', ['institucion'=>$institucion]);
    }
}
