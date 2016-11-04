<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cargo;

class CargoController extends Controller
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
        $cargo=Cargo::orderBy('idcargo', 'desc')                  
                  ->select('cargos.idcargo', 'cargos.cargo')
                  ->where('cargos.cargo', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
        return view('mostarcargo', ['cargo'=>$cargo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrocargo');
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

        $cargo = new Cargo();

        $cargo->cargo=$nombre;

        $cargo->save();

        flash("El cargo ".$cargo->cargo." se ha registrado exitósamente", 'success');

        return redirect('/cargo/registrar');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cargo=Cargo::orderBy('idcargo', 'desc')                  
                  ->select('cargos.idcargo', 'cargos.cargo')
                  ->paginate(15);        
        return view('mostarcargo', ['cargo'=>$cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view('editarcargo', ['cargo'=>$cargo]);
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
        $cargo = Cargo::find($id);

        $var=$request->all();

        $nombre=$var['nombre'];
        $cargo->cargo=$nombre;

        $cargo->save();

        return redirect('cargo/mostrar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo=Cargo::find($id);
        $cargo->delete($id);
        $cargo=Cargo::all();
        return view('MostarCargo', ['cargo'=>$cargo]);
    }
}
