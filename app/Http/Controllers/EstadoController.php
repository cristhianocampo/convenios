<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Estado;

class EstadoController extends Controller
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
        $estado=Estado::orderBy('idestado', 'desc')                  
                  ->select('estados.idestado', 'estados.nombreestado')
                  ->where('estados.nombreestado', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
        return view('mostrarestado', ['estado'=>$estado]);             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registroestado');
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

        $estado = new Estado();

        $estado->nombreestado=$nombre;

        $estado->save();

        flash("El estado ".$estado->nombreestado." se ha registrado exitósamente", 'success');

        return redirect('/estado/registrar');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $estado=Estado::orderBy('idestado', 'desc')                  
                  ->select('estados.idestado', 'estados.nombreestado')
                  ->paginate(15);        
        return view('mostrarestado', ['estado'=>$estado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);
        return view('editarestado', ['estado'=>$estado]);
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
        $estado = Estado::find($id);

        $var=$request->all();

        $nombre=$var['nombre'];
        $estado->nombreestado=$nombre;

        $estado->save();

        return redirect('estado/mostrar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo=Estado::find($id);
        $cargo->delete($id);
        $cargo=Estado::all();
        return view('MostarCargo', ['cargo'=>$cargo]);
    }
}
