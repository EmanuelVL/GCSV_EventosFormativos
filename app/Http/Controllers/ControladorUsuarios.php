<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Instructor;

class ControladorUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.mostrarUsuarios',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.crearUsuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->nombreUsuario = $request->input('nombreUsuario');
        $usuario->apellidoUsuario = $request->input('apellidoUsuario');
        $usuario->correo = $request->input('correo');
        $usuario->password = bcrypt(request('password'));
        $usuario->esInstancia = $request->input('esInstancia');
        $usuario->esInstructor = $request->input('esInstructor');
        $usuario->esAdmin = $request->input('esAdmin');

        $usuarios = Usuario::all();

        foreach($usuarios as $user){
            if($user->correo == $usuario->correo){
                return back()->withErrors(['Usted ya está registrado ', 'The Message']);
            }
        }

        /*
        $password_confirm = $request->input('password_confirm');

        if($usuario->password != $password_confirm){
            return redirect()->route('gestionusuarios.index')->with('failed','Usuario no ha podido ser creado satisfactoriamente, ya que las contraseñas no son identicas.');;
        }
        else{
            $usuario->save();

            $instructor = $request->input('instructor');

            if($instructor == 1){
                $instructor = new Instructor();

                $instructor->idUsuario = $usuario->idUsuario;

                $instructor->save();
            }
            */

            if($request->esAdmin != 1){
            $usuario->esAdmin = 0;
        }
        else{
            $usuario->esAdmin = 1;
        }

        if($request->esInstancia != 1){
            $usuario->esInstancia = 0;
        }
        else{
            $usuario->esInstancia = 1;
        }

        if($request->esInstructor != 1){
            $usuario->esInstructor = 0;
        }
        else{
            $usuario->esInstructor = 1;
        }

            $usuario->save();

            if($usuario->esInstructor == 1){
                $instructor = new Instructor();

                $instructor->idUsuario = $usuario->idUsuario;

                $instructor->save();
        }

        return redirect()->route('gestionusuarios.index')->with('success','Usuario Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.mostrarUsuarios',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editarUsuarios', compact('usuario'));
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
        $usuario = Usuario::find($id);

        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->apellidoUsuario = $request->apellidoUsuario;
        $usuario->correo = $request->correo;
        $usuario->password = bcrypt(request('password'));

        if($request->esAdmin != 1){
            $usuario->esAdmin = 0;
        }
        else{
            $usuario->esAdmin = 1;
        }

        if($request->esInstancia != 1){
            $usuario->esInstancia = 0;
        }
        else{
            $usuario->esInstancia = 1;
        }

        if($request->esInstructor != 1){
            $usuario->esInstructor = 0;
        }
        else{
            $usuario->esInstructor = 1;
        }

        /*
        $password_confirm = $request->input('password_confirm');

        if($usuario->password != $password_confirm){

            return redirect()->route('gestionusuarios.index')->with('failed','Usuario no ha podido ser creado satisfactoriamente, ya que las contraseñas no son identicas.');;
        }
        else{
            $usuario->save();

            return redirect()->route('gestionusuarios.index')
                        ->with('success','Usuario actualizado satisfactoriamente.');
        }
        */

        $usuario->save();

        return redirect()->route('gestionusuarios.index')->with('success','Usuario actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::all();

        foreach ($instructor as $inst) {
            if($inst->idUsuario == $id){
                $inst = Instructor::findOrFail($inst->idInstructor);
                $inst->delete();
                break;
            }
        }

        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return redirect()->route('gestionusuarios.index')->with('success', 'Usuario borrado satisfactoriamente');
    }
}
