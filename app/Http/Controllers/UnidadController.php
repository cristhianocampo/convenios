<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Unidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $valores=$request->all();
        $buscar=$valores['buscar'];
        $unidad=Unidad::orderBy('idunidad', 'desc')                  
                  ->select('unidads.idunidad', 'unidads.nombreunidad')
                  ->where('unidads.nombreunidad', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
        return view('mostrarunidad', ['unidad'=>$unidad]);             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrounidad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor = $request->all();
        $nombre = $valor['nombre'];        

        $unidad = new Unidad();

        $unidad->nombreunidad=$nombre;
        
        $unidad->save();

        flash("La unidad ".$unidad->nombreunidad." se ha registrado exitósamente", 'success');

        return redirect('/unidad/registrar');          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $unidad=Unidad::orderBy('idunidad', 'desc')                  
                  ->select('unidads.idunidad', 'unidads.nombreunidad')
                  ->paginate(15);        
        return view('mostrarunidad', ['unidad'=>$unidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Unidad::find($id);
        return view('editarunidad', ['unidad'=>$unidad]);
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
        $unidad = Unidad::find($id);

        $var=$request->all();

        $nombre=$var['nombre'];

        $unidad->nombreunidad=$nombre;        

        $unidad->save();

        return redirect('unidad/mostrar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidad=Unidad::find($id);
        $unidad->delete($id);
        $cargo=Unidad::all();
        return view('MostrarUnidad', ['unidad'=>$unidad]);
    }
}
