<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Unidad;

use App\Enlace;

use App\Cargo;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        $enlace=Enlace::nombre($request->get('nombre'))->orderBy('idenlace', 'desc')->paginate();       

        return view('MostrarEnlace', ['enlace'=>$enlace]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad=Unidad::all();
        $cargo = Cargo::all();
        return view('registroenlace', ['unidad'=>$unidad, 'cargo'=>$cargo]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor=$request->all();
        $nombre=$valor['nombre'];
        $int=$valor['institucion'];
        $telefono=$valor['telefono'];
        $email=$valor['email'];
        $tipo=$valor['tipo'];
        $unidades=$valor['unidad'];
        $cargo=$valor['cargo'];

        $enlace = new Enlace();

        $enlace->nombreenlace=$nombre;
        $enlace->institucion=$int;
        $enlace->telefono=$telefono;
        $enlace->email=$email;
        $enlace->tipo=$tipo;
        $enlace->unidad_id=$unidades;
        $enlace->cargo_id=$cargo;

        $enlace->save();

        flash("La persona de enlace ".$enlace->nombreenlace." se ha registrado exitósamente", 'success');

        return redirect('/enlace/registrar');          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $enlace=Enlace::orderBy('idenlace', 'desc')
                  ->join('unidads', 'unidads.idunidad', '=', 'enlaces.unidad_id')
                  ->join('cargos', 'cargos.idcargo', '=', 'enlaces.cargo_id')
                  ->select('enlaces.*', 'cargos.cargo', 'unidads.nombreunidad')
                  ->paginate(15);
        return view('MostrarEnlace', ['enlace'=>$enlace]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idenlace)
    {
        $unidad=Unidad::all();
        $cargo = Cargo::all();
        $enlace = Enlace::find($idenlace);
        return view('editarenlace', ['enlace'=>$enlace, 'unidad'=>$unidad, 'cargo'=>$cargo]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enlace = Enlace::find($id);

        $valor=$request->all();
        $nombre=$valor['nombre'];
        $int=$valor['institucion'];
        $telefono=$valor['telefono'];
        $email=$valor['email'];
        $tipo=$valor['tipo'];
        $unidades=$valor['unidad'];
        $cargo=$valor['cargo'];
        $enlace->nombreenlace=$nombre;
        $enlace->institucion=$int;
        $enlace->telefono=$telefono;
        $enlace->email=$email;
        $enlace->tipo=$tipo;
        $enlace->unidad_id=$unidades;
        $enlace->cargo_id=$cargo;

        $enlace->save();

        return redirect('enlace/mostrar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
