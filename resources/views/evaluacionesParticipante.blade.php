<?php
    if(!(auth()->user())){
        header('Location: http://sistemaeventosformativos.test/');
        die();
    }
?>
<!DOCTYPE html>
@extends('layout.layout')
@section('content')  
<style>
table.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
<?php
    require ("C:/laragon/www/SistemaEventosFormativos/database/factories/herramientasEvaluaciones.php");
    $idUsuario = auth()->user()->idUsuario;
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $idEFP = $_GET['idEFP'];
        #$idUsuario = $_GET['idU'];
        

    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $idEFP = $_POST['idEFP'];
        #$idUsuario = $_GET['idU'];
        

    }

?>

<title> Evaluaciones </title>
    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-body" >
                <form method = "POST"> 
                @csrf 
                    <div class="container">

                        <!-- Page Heading -->
                        <div class="card-header border-0">
                            <h1 class="titulo">Evaluación del evento formativo</h1>
                        </div>
                   
                        <!-- Page Heading -->
                        
                        
                        <div class="card card-primary card-outline" style="text-align: center; opacity:1;">
                            <div class="card-header">
                                <h5 class="m-0">Autoevaluación: </h5>
                            </div>
                            <div class="card-body">
                                <div class="cuadro">
                                    1.-En un rango del 1 al 10, ¿Como consideras tu mejora en la materia impartida?                      
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='AP1' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='AP1' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='AP1' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='AP1' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='AP1' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='AP1' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='AP1' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='AP1' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='AP1' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='AP1' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    2.-En un rango del 1 al 10, ¿Que calificación consideras que mereces?                     
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='AP2' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='AP2' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='AP2' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='AP2' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='AP2' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='AP2' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='AP2' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='AP2' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='AP2' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='AP2' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    3.-En un rango del 1 al 10, ¿Como fue tu desempeño durante la clase?       
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='AP3' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='AP3' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='AP3' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='AP3' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='AP3' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='AP3' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='AP3' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='AP3' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='AP3' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='AP3' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    4.-En un rango del 1 al 10, ¿Que tanto consideras que tu conocimiento general sobre el tema ha aumentado?                  
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='AP4' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='AP4' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='AP4' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='AP4' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='AP4' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='AP4' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='AP4' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='AP4' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='AP4' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='AP4' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    5.-En un rango del 1 al 10, ¿Como calificarias tu comportamiento durante la clase?                   
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='AP5' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='AP5' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='AP5' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='AP5' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='AP5' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='AP5' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='AP5' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='AP5' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='AP5' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='AP5' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    
                   
                        <!-- Page Heading -->
                        
                        
                        <div class="card card-primary card-outline" style="text-align: center; opacity:1;">
                            <div class="card-header">
                                <h5 class="m-0">Evaluación del docente: </h5>
                            </div>
                            <div class="card-body">
                                <div class="cuadro">
                                    1.-En un rango del 1 al 10, ¿Como consideras el desempeño general del docente?                      
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='DP1' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='DP1' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='DP1' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='DP1' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='DP1' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='DP1' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='DP1' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='DP1' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='DP1' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='DP1' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    2.-En un rango del 1 al 10, ¿Como consideras el conocimiento sobre la materia del docente?                     
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='DP2' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='DP2' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='DP2' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='DP2' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='DP2' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='DP2' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='DP2' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='DP2' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='DP2' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='DP2' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    3.-En un rango del 1 al 10, ¿Como consideras su comportamiento hacia los participantes?                     
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='DP3' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='DP3' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='DP3' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='DP3' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='DP3' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='DP3' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='DP3' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='DP3' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='DP3' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='DP3' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    4.-En un rango del 1 al 10, ¿Como consideras el uso de las tecnologias por parte del profesor?                     
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='DP4' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='DP4' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='DP4' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='DP4' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='DP4' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='DP4' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='DP4' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='DP4' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='DP4' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='DP4' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    5.-En un rango del 1 al 10, ¿Como consideras el uso del material por parte del profesor a lo largo del curso?                  
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='DP5' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='DP5' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='DP5' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='DP5' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='DP5' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='DP5' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='DP5' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='DP5' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='DP5' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='DP5' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                       
                        <!-- Page Heading -->
                        
                        
                        <div class="card card-primary card-outline" style="text-align: center; opacity:1;">
                            <div class="card-header">
                                <h5 class="m-0">Evaluación del programa: </h5>
                            </div>
                            <div class="card-body">
                                <div class="cuadro">
                                    1.-En un rango del 1 al 10, ¿Que tan dificil consideras que fue la materia?                   
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='PP1' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='PP1' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='PP1' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='PP1' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='PP1' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='PP1' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='PP1' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='PP1' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='PP1' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='PP1' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    2.-En un rango del 1 al 10, ¿Que tan bien enlazados fueron los temas del curso?                  
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='PP2' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='PP2' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='PP2' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='PP2' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='PP2' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='PP2' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='PP2' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='PP2' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='PP2' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='PP2' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    3.-En un rango del 1 al 10, ¿Que tan util consideras que te fue el curso?                     
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='PP3' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='PP3' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='PP3' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='PP3' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='PP3' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='PP3' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='PP3' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='PP3' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='PP3' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='PP3' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    4.-En un rango del 1 al 10, ¿Que tan pesado se te hizo el material del curso?                      
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='PP4' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='PP4' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='PP4' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='PP4' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='PP4' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='PP4' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='PP4' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='PP4' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='PP4' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='PP4' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cuadro">
                                    5.-En un rango del 1 al 10, ¿Que tan util consideras que fue la clase para ti?                      
                                    <table style="margin-left: auto;margin-right: auto;">
                                        <tr>
                                            <td style='padding:0 15px 0 15px;'>1 <input type='radio' id='seleccion' name='PP5' value=1 required></td>
                                            <td style='padding:0 15px 0 15px;'>2 <input type='radio' id='seleccion' name='PP5' value=2 required></td>
                                            <td style='padding:0 15px 0 15px;'>3 <input type='radio' id='seleccion' name='PP5' value=3 required></td>
                                            <td style='padding:0 15px 0 15px;'>4 <input type='radio' id='seleccion' name='PP5' value=4 required></td>
                                            <td style='padding:0 15px 0 15px;'>5 <input type='radio' id='seleccion' name='PP5' value=5 required></td>
                                            <td style='padding:0 15px 0 15px;'>6 <input type='radio' id='seleccion' name='PP5' value=6 required></td>
                                            <td style='padding:0 15px 0 15px;'>7 <input type='radio' id='seleccion' name='PP5' value=7 required></td>
                                            <td style='padding:0 15px 0 15px;'>8 <input type='radio' id='seleccion' name='PP5' value=8 required></td>
                                            <td style='padding:0 15px 0 15px;'>9 <input type='radio' id='seleccion' name='PP5' value=9 required></td>
                                            <td style='padding:0 15px 0 15px;'>10 <input type='radio' id='seleccion' name='PP5' value=10 required></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                  

                        <!-- /.row -->
                        <div class="cuadro"> 
                            <table style="margin-left: auto;margin-right: auto;">
                                <tr>
                                    <th><a href='/evaluaciones' class='btn btn-primary'>volver</a></th>
                                    <th><button onclick="guardarEvaluacion()" name="idEFP" class='btn btn-primary' value=<?php echo $idEFP ?> >Guardar</button></th> 
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                </form>
                
                <!-- /.container -->
            </div>
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
    </div>
    </div>

    <script>
        function guardarEvaluacion() {
            var resp = document.forms[1];
            var val[15];
            var contador = 0;
                for (var i =  0; i < resp.length; i++) {
                    if( resp[i].checked){
                        val[contador] = resp[i].value;

                        contador++;  
                    }
                }
                
            
            
                if(contador==15){
                    <?php  
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $evaluacion = new Evaluacion();
                        $idEFP = $_POST['idEFP'];
                        $actualizar = $evaluacion->cursoParticipante($idUsuario,$idEFP);

                        
                        $P1 = $_POST['AP1'];
                        $P2 = $_POST['AP2'];
                        $P3 = $_POST['AP3'];
                        $P4 = $_POST['AP4'];
                        $P5 = $_POST['AP5'];
                        
                        if($actualizar != null){
                            $base = $evaluacion->actualizarAutoevaluacion($idEFP,$idUsuario,$P1,$P2,$P3,$P4,$P5);
                        }else{
                            $base = $evaluacion->guardarAutoevaluacion($idEFP,$idUsuario,$P1,$P2,$P3,$P4,$P5);
                        }
                        
                        $P1 = $_POST['DP1'];
                        $P2 = $_POST['DP2'];
                        $P3 = $_POST['DP3'];
                        $P4 = $_POST['DP4'];
                        $P5 = $_POST['DP5'];

                        if($actualizar != null){
                            $base = $evaluacion->actualizarEvaluacionDocente($idEFP,$idUsuario,$P1,$P2,$P3,$P4,$P5);
                        }else{
                            $base = $evaluacion->guardarEvaluacionDocente($idEFP,$idUsuario,$P1,$P2,$P3,$P4,$P5);
                        }
                        $P1 = $_POST['PP1'];
                        $P2 = $_POST['PP2'];
                        $P3 = $_POST['PP3'];
                        $P4 = $_POST['PP4'];
                        $P5 = $_POST['PP5'];

                        if($actualizar != null){
                            $base = $evaluacion->actualizarEvaluacionPrograma($idEFP,$idUsuario,$P1,$P2,$P3,$P4,$P5);
                        }else{
                            $base = $evaluacion->guardarEvaluacionPrograma($idEFP,$idUsuario,$P1,$P2,$P3,$P4,$P5);
                        }
                    }


                        #guardarAutoevaluacion($idEFP,$idUsuario,$valores[0],$valores[1],$valores[2],$valores[3],$valores[4]);
                 ?>    
                }
                
            
          
        }

        
    </script>

    </body>
</html>
@endsection
