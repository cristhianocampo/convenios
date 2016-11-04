<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class UsuarioController extends Controller
{
    public function crear(){
      return view('usuarios');
    }

    public function registrar(){
      if(Auth::check()){//logueado
        $tipo=Auth::user()->type;
        if($tipo=="0"){//si es superadministrador
          return view('auth.register');
        }
        else {
          return redirect('/');
        }
      }else{//no logueado
        return redirect('/');
      }     
    }
    public function regist_user(Request $request){

      $user=new User();
      $valores=$request->all();
      $name=$valores['name'];
      $email=$valores['email'];
      $type=$valores['type'];
      $password=bcrypt($valores['password']);
      $user->name=$name;
      $user->email=$email;
      $user->type=$type;
      $user->password=$password;
      $user->save();
      flash("El usuario ".$user->name." se ha registrado exitósamente", 'success');

        return redirect('/usuario/registrar');      
    }
    public function mostrar()
    {
      $usuario=User::all();
      return view('mostrarusuario', ['usuario'=>$usuario]);
    }
    public function editar($id)
    {
      $usuario = User::find($id);
      return view('editarusario', ['usuario'=>$usuario]);
    }

  public function modificar(Request $request, $id)
  {
    $usuario = User::find($id);

    $var=$request->all();

    $nombre=$var['name'];
    $email=$var['email'];
    $tipo=$var['type'];
    $password=bcrypt($var['password']);
    
    $usuario->name=$nombre;
    $usuario->email=$email;
    $usuario->type=$tipo;
    $usuario->password=$password;

    $usuario->save();

    return redirect('usuario/mostrar');
  }
}
