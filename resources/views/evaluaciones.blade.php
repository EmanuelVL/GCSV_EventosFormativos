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

    $evaluacion1 = new Evaluacion();
    $evaluacion2 = new Evaluacion();
    $evaluacion3 = new Evaluacion();
    $constancia2 = new Evaluacion();
    $constancia3 = new Evaluacion();
    $constancia4 = new Evaluacion();
    $constancia5 = new Evaluacion();

    $idUsuario = auth()->user()->idUsuario;;

    $listaEFTerminadosParticipante = $evaluacion1->listaEventosTerminadosParticipante($idUsuario);
    $listaEFTerminadosInstructor = $evaluacion2->listaEventosTerminadosInstructor($idUsuario);
    #$autoevaluacion = $evaluacion3->cursosParticipante($idUsuario);
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $idEF = $_POST['idEFP'];

        $bandera = true;

        $autoeval = $constancia2->autoevaluacionRealizada($idEF, $idUsuario);
        $autoeval = $autoeval[0];

        $calificado = $constancia3->participantesCalificados($idEF);
        $calificado = $calificado[0];

        $evalprograma = $constancia4->evaluacionprogramaRealizada($idEF, $idUsuario);
        $evalprograma = $evalprograma[0];

        $evaldocente = $constancia5->evaluaciondocenteRealizada($idEF, $idUsuario);
        $evaldocente = $evaldocente[0];
    }

?>

<title> Evaluaciones </title>
    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-body" >
                <div class="container">

                    <!-- Page Heading -->
                    <div class="card-header border-0">
                <h1 class="titulo">Evaluación de eventos formativos</h1>
                <div class="card-tools">
                  
                </div>
              </div>
               
                    <!-- Page Heading -->
                    <?php
                    if($listaEFTerminadosParticipante != null){
                        echo "<div class='card card-primary card-outline' style='text-align: center; opacity:1;'>";
                          echo "<div class='card-header'>";
                            echo "<h5 class='m-0'>Evaluar eventos formativos: </h5>";
                          echo "</div>";
                          echo "<div class='card-body'>";
                            echo "<div class='cuadro'>";
                                echo "<form action='/evaluacionesParticipante' method='GET'>";
                                   
                                    echo "<div class='listaeventos'>";
                                        echo "<table class = 'center'>";
                                            echo "<tr>";
                                                echo "<th style='padding:0 15px 0 15px;'></th>";
                                                echo "<th style='padding:0 60px 0 60px;'>Nombre</th>";
                                                echo "<th style='padding:0 60px 0 60px;'></th>";
                                            echo "</tr>";
                                            
                                                
                                            foreach($listaEFTerminadosParticipante as $elemento){

                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>" . $elemento['nombreEF'] . "</td>";
                                                echo "<td><input type='radio' id='seleccion' name='idEFP' value=" . $elemento['idEF'] . " required></td>";
                                                echo "</tr>";
                                            }
                                                
                                            
                                        echo "</table>";
                                        
                                        echo "<button type='submit'  class='btn btn-primary' >Evaluar</button>";
                                    echo "</div>";
                                echo "</form>";
                                
                            echo "</div>";
                            
                          echo "</div>";
                        echo "</div>";
                    }
              
                    if($listaEFTerminadosInstructor != null){
                        echo "<div class='card card-primary card-outline' style='text-align: center; opacity:1;'>";
                          echo "<div class='card-header'>";
                            echo "<h5 class='m-0'>Evaluar participantes de evento formativo: </h5>";
                          echo "</div>";
                          echo "<div class='card-body'>";
                            echo "<div class='cuadro'>";
                                echo "<form action='/evaluacionesInstructor' method='GET'>";
                                   
                                    echo "<div class='listaeventos'>";
                                        echo "<table class = 'center'>";
                                            echo "<tr>";
                                                echo "<th style='padding:0 15px 0 15px;'></th>";
                                                echo "<th style='padding:0 60px 0 60px;'>Nombre</th>";
                                                echo "<th style='padding:0 60px 0 60px;'></th>";
                                            echo "</tr>";
                                            
                                                
                                                foreach($listaEFTerminadosInstructor as $elemento){
                                                    echo "<tr>";
                                                    echo "<td></td>";
                                                    echo "<td>" . $elemento['nombreEF'] . "</td>";
                                                    echo "<td><input type='radio' id='seleccion' name='idEFI' value=" . $elemento['idEF'] . " required></td>";
                                                    echo "</tr>";
                                                }
                                                
                                            
                                        echo "</table>";
                                        echo "<button type='submit'  class='btn btn-primary' >Evaluar</button>";
                                    echo "</div>";
                                echo "</form>";
                                
                            echo "</div>";
                            
                          echo "</div>";
                        echo "</div>";
                    }

                    if($listaEFTerminadosInstructor == null && $listaEFTerminadosParticipante == null){
                        echo "<div class='card card-primary card-outline' style='text-align: center; opacity:1;'>";
                          echo "<div class='card-header'>";
                            echo "<h5 class='m-0'>Eventos formativos: </h5>";
                          echo "</div>";
                          echo "<div class='card-body'>";
                            echo "<h5 class='m-0'>No tienes Eventos Formativos o aún no terminan </h5>";
                            
                          echo "</div>";
                        echo "</div>";
                    }
                    ?>
                          
                              

                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
    </body>
</html>
@endsection
