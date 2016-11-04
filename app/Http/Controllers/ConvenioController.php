<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Convenio;
use Carbon\Carbon;
use App\Enlace;
use App\Institucion;
use App\Estado;

class ConvenioController extends Controller
{
    public function crear()
    {
    	$enlacei=Enlace::where('tipo', 'Interno')->get();
      $enlacee=Enlace::where('tipo', 'Externo')->get();
      $institucion = Institucion::all();
      $estado = Estado::all();
      return view('registroconvenio', ['enlacei'=>$enlacei, 'enlacee'=>$enlacee, 'institucion'=>$institucion, 'estado'=>$estado]);
    }

    public function guardar(Request $request)
    {
     	$valores = $request->all();   	  

    	$nombreconve=$valores['nombre'];
		  $tipoconve=$valores['tipo'];
		  $objetivo=$valores['objetivo'];
		  $procedencia=$valores['procedencia'];
		  $fechafirma=$valores['fechafirma'];
      $fechafirma=date("d-m-Y",strtotime($fechafirma));

		  $fechaini=$valores['fechainicio'];
      $fechaini=date("d-m-Y",strtotime($fechaini));
		  $fechafin=$valores['fechafin'];
      $fechafin=date("d-m-Y",strtotime($fechafin));		  

		  $frenovacion=$valores['forma'];
		  $pais=$valores['pais'];
		  $descripcion=$valores['descripcion'];
		  $comentario=$valores['comentarios'];

		  $date = Carbon::now(); 
      $date = $date->format('d-m-Y');       
      $path= $request->file('file');
      $archivo = $date."-".$path->getClientOriginalName();

  		$enlace_id=$valores['gestor'];
      $enlaceext=$valores['gestorext'];
	   	$institucion_id=$valores['idinstitucion'];
		  $estado_id=$valores['estado'];
		  
      $bcp=$valores['bcp'];
      $blp=$valores['blp'];        

      $convenio = new Convenio();

      $convenio->nombreconve=$nombreconve;
      $convenio->tipoconve=$tipoconve;
      $convenio->objetivo=$objetivo;
      $convenio->procedencia=$procedencia;  
      $convenio->fechafirma=$fechafirma;
	    $convenio->fi=$fechaini;
      $convenio->ff=$fechafin;
	    $convenio->frenovacion=$frenovacion;
	    $convenio->pais=$pais;
	    $convenio->descripcion=$descripcion;
	    $convenio->comentario=$comentario;
	    $convenio->archivo=$archivo;
	    $convenio->enlace_id=$enlace_id; 
      $convenio->enlaceext=$enlaceext;
	    $convenio->institucion_id=$institucion_id;
	    $convenio->estado_id=$estado_id;	       
      $convenio->beneficioscp=$bcp;    
      $convenio->beneficioslp=$blp;

	    $convenio->save();

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');
     
        //obtenemos el nombre del archivo
        $nombre = $date."-".$file->getClientOriginalName();
     
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));

        flash("Convenio ".$nombreconve." registrado con éxito", 'success');

        return redirect('/convenio/registrar');        

    }

    public function editar($id)
    {     
      $enlacei=Enlace::where('tipo', 'Interno')->get();
      $enlacee=Enlace::where('tipo', 'Externo')->get();
      $institucion = Institucion::all();
      $estado = Estado::all(); 
    	$convenio=Convenio::orderBy('idconvenio', 'desc')
                 ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                 ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                 ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                 ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                 ->where('convenios.idconvenio', $id)
                ->get();
                
      return view('editarconvenio', ['convenio'=>$convenio, 'enlacei'=>$enlacei, 'enlacee'=>$enlacee, 'institucion'=>$institucion, 'estado'=>$estado]);
    }

    public function modificar(Request $request, $id)
    {
    	$convenio = Convenio::find($id);   	

      $valores=$request->all();

      $estado=$valores['estado'];

      $convenio->estado_id=$estado;

      $convenio->save();

      
      return redirect('/convenio/mostrar');
    }

    public function mostrar()
    {	
      $convenio= Convenio::orderBy('idconvenio', 'desc')
                ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
      		      ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
           		  ->paginate(15);
        
      return view('mostrarconvenio', ['convenio'=>$convenio]);        
    }

    public function index(Request $request)
    {
        $valores = $request->all();
        $info=$valores['info']; 
        $buscar=$valores['buscar']; 

        if($info == "nombre")
        {
            $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.nombreconve', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);    
        }

        else if($info == "tipo")
        {
             $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.tipoconve', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);    
        }

        else if($info == "procedencia")
        {
             $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.procedencia', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);    
        }
        else if($info == "institucion")
        {
             $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('institucions.nombreinstitucion', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);    
        }
        else if($info == "frenovacion")
        {
            $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.frenovacion', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);             
        }
        else if($info == "pais")
        {
            $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.pais', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);                            
        }
        else if($info == "estado")
        {
            $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('estados.nombreestado', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]); 
        }
        else if($info == "pe")
        {
            $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('enlaces.nombreenlace', 'like', '%'.$buscar.'%')
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]); 
        }
        else
        {
            //Retorna o un mensaje de que no se ha ingresado texto o uno de que el campo esta vacío
            $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->paginate(15);
        
            return view('mostrarconvenio', ['convenio'=>$convenio]);
        }
        
    }

    public function perfil($id)
    {
      $convenios= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.idconvenio', $id)
              ->get();
                                          
            
      return view('perfilconvenio', ['convenios'=>$convenios]);
    }

    public function riv()
    {
      $institucion=Institucion::all();
      return view('reporteinstitucionvigencia', ['institucion'=>$institucion]);
    }

    public function riv1(Request $request)
    {
      $valores=$request->all();
      $fi=$valores['fi'];
      $fi=date("d-m-Y",strtotime($fi));
      $ff=$valores['ff'];
      $ff=date("d-m-Y",strtotime($ff));
      $institucion=$valores['institucion'];
      
      $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.fi', '>=', $fi)
                  ->where('convenios.ff', '<=', $ff)
                  ->where('convenios.institucion_id', $institucion)
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]); 
    }

    public function rie()
    {
      $institucion=Institucion::all();
      $estado=Estado::all();
      return view('reporteinstitucionestado', ['institucion'=>$institucion, 'estado'=>$estado]);
    }

    public function rie1(Request $request)
    {
      $valores=$request->all();
      $institucion=$valores['institucion'];
      $estado=$valores['estado'];

      $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.institucion_id', $institucion)
                  ->where('convenios.estado_id', $estado)                  
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]); 
    }
    public function rpf()
    {
      $convenio = Convenio::all();
      return view('reportepaisfecha', ['convenio'=>$convenio]);
    }

    public function rpf1(Request $request)
    {
      $valores=$request->all();
      $pais=$valores['pais'];
      $fechafirma=$valores['fechafirma'];

      $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.pais', $pais)
                  ->where('convenios.fechafirma', $fechafirma)                  
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]); 
    }

    public function rfp()
    {
      return view('reportefecharprocedencia');
    }

    public function rfp1(Request $request)
    {
      $valores=$request->all();
      $frenovacion=$valores['forma'];
      $procedencia=$valores['proce'];

      $convenio= Convenio::orderBy('idconvenio', 'desc')
                  ->join('enlaces', 'enlaces.idenlace', '=', 'convenios.enlace_id')
                  ->join('estados', 'estados.idestado', '=', 'convenios.estado_id')
                  ->join('institucions', 'institucions.idinstitucion', '=', 'convenios.institucion_id')
                  ->select('convenios.idconvenio', 'convenios.nombreconve', 'convenios.tipoconve', 'convenios.objetivo', 'convenios.procedencia', 'convenios.fechafirma', 'convenios.fi', 'convenios.ff', 'convenios.frenovacion', 'convenios.pais', 'convenios.descripcion', 'convenios.comentario', 'convenios.archivo', 'convenios.enlace_id', 'convenios.enlaceext', 'convenios.institucion_id', 'convenios.estado_id', 'convenios.beneficioscp', 'convenios.beneficioslp', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado')
                  ->where('convenios.frenovacion', $frenovacion)
                  ->where('convenios.procedencia', $procedencia)                  
                  ->paginate(15);        
            return view('mostrarconvenio', ['convenio'=>$convenio]);  
      return view('reportefecharprocedencia');
    }
}
