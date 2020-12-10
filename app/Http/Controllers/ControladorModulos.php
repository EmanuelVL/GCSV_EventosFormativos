<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\EventoFormativo;
use App\Usuario;
use App\Instructor;
use App\tipoEvento;
use App\Modulo;
use App\Rules\EventoFormativo as AppEventoFormativo;
use App\Documento;


class ControladorModulos extends Controller
{
    public function create($idEF)
    {
        $usuarios= Usuario::all();
        $instructor = Instructor::all();
        $tipoEvento = tipoEvento::all();
        // dd($academicos);
        // $academicoConCategoria = Academico::has('categoria')->get();
        //$academicoSinCategoria = Academico::doesnthave('categoria')->get();

        return view('eventos.crearEvento',compact('usuarios','instructor','tipoEvento'));
    }

    public function store(Request $request){
       
            
        
            $modulo = new Modulo();
            $modulo ->idEF = $request->input('evento_id');
            $modulo ->nombreModulo = $request->input('nombreModulo');
            $modulo ->contenidoModulo = $request->input('contenidoModulo');
            $modulo ->duracionModulo = $request->input('duracion');
          
            
            $modulo ->save();
        
            return redirect()->route('modulos.show',$modulo->idEF);
        
    
    }

    public function show($idEF)
    {
        $evento = EventoFormativo::where('idEF', $idEF)->firstOrFail();
        $modulos = Modulo::where('idEF', $idEF)->get();
        

        return view('eventos.modulosEvento', compact('evento','modulos','idEF'));
    }
    public function destroy($idEF)
    {
        $modulo = Modulo::where('idModulo', $idEF)->firstOrFail();
        $modulo-> delete();
        return back();
    }


    public function edit($idMod)
    {   

        $modulo = Modulo::where('idModulo', $idMod)->firstOrFail();
        //checa si la categoria tiene un academico o no
        
        return view('eventos.editarModulos',compact('modulo'));
       
    }
    public function update(Request $request, $idMod)
    {
        
            $modulo = Modulo::where('idModulo', $idMod)->firstOrFail();
            $modulo ->idEF = $modulo ->idEF;
            $modulo ->nombreModulo = $request->input('nombreModulo');
            $modulo ->contenidoModulo = $request->input('contenidoModulo');
            $modulo ->duracionModulo = $request->input('duracion');
            $modulo->save();
            
          
            return redirect()->route('modulos.show',$modulo->idEF);
        
       
      
    }
}