<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\EventoFormativo;
use App\Usuario;
use App\Instructor;
use App\tipoEvento;
use App\Inscripcion;
use App\Rules\EventoFormativo as AppEventoFormativo;
use App\Documento;
use App\Modulo;

class ControladorInscripciones extends Controller
{


    public function show($idEF)
    {
        $ins = new Inscripcion();
        $ins ->idUsuario = auth()->user()->idUsuario;
        $ins ->idEF = $idEF;
        $ins1 = Inscripcion::where('idUsuario', auth()->user()->idUsuario)->get();
        foreach($ins1 as $insc){
            if($insc ->idEF == $idEF){
                return back()->withErrors(['Usted ya está inscrito a ese evento ', 'The Message']);
            }
        }

        $ins ->save();

        return back()->withErrors(['Usted se ha inscrito correctamente :)', 'The Message']);

    }


}
