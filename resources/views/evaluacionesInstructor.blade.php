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
    $idUsuario = 3;
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $idEFI = $_GET['idEFI'];
        #$idUsuario = $_GET['idU'];
        

    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $idEFI = $_POST['idEFI'];
        header("Refresh:0");  
        #$idUsuario = $_GET['idU'];
        

    }

    $evaluacion1 = new Evaluacion();
    $listaParticipantes = $evaluacion1->participantes($idEFI);
    $listaEvento = $evaluacion1->participantesEF($idEFI);


    #$key = array_search('100', array_column($userdb, 'uid'));

?>

<title> Evaluaciones </title>
    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-body" >
                <form method = "POST"> 
                @csrf 
                <th><input type="hidden" name="apr"  value=0 ></input></th> 
                <th><input type="hidden" name="rep"  value=0 ></input></th> 
                    <div class="container">

                        <!-- Page Heading -->
                        <div class="card-header border-0">
                            <h1 class="titulo">Evaluación de participanes</h1>
                        </div>
                   
                        <!-- Page Heading -->
                        
                        <?php  
                        if($listaParticipantes != null){
                        ?>
                        <div class='card card-primary card-outline' style='text-align: center; opacity:1;'>
                            <div class='card-header'>
                                <h5 class='m-0'>Participantes del evento: </h5>
                            </div>
                            <div class='card-body'>
                                <div class='cuadro'>
                                <div class='listaeventos'>
                                    <table class = 'center'>
                                        <tr>
                                                
                                                <th style='padding:0 30px 0 30px;'>Nombre</th>
                                                <th style='padding:0 30px 0 30px;'>Apellido</th>
                                                <th style='padding:0 30px 0 30px;'>Aprobar</th>
                                                <th style='padding:0 30px 0 30px;'>Reprobar</th>
                                                <th style='padding:0 30px 0 30px;'>Aprobado</th>
                                                <th style='padding:0 15px 0 15px;'>Calificación</th>
                                                
                                                
                                            </tr>
                                            <?php
                                    foreach($listaParticipantes as $index => $elemento){
                                        echo "<tr>";
                                        
                                        echo "<td>" . $elemento['nombreUsuario'] . "</td>";
                                        echo "<td>" . $elemento['apellidoUsuario']. "</td>";
                                        

                                         echo "<td><button type='submit' onclick='guardarAprovados()' name='apr'  value=" . $elemento['idUsuario'] . " >   </td>";

                                         echo "<td><button type='submit' onclick='guardarReprobados()' name='rep'  value=" . $elemento['idUsuario'] . " >   </td>";

                                         

                                         if($listaEvento[$index]['aprobado']){
                                            echo "<th style='padding:0 30px 0 30px;'>SI</th>";
                                         }else{
                                            echo "<th style='padding:0 30px 0 30px;'>NO</th>";
                                         }
                                         
                                         echo "<td><input type='text' style='text-align:center;'  id='calif[]' name='calif[]' value=" . $listaEvento[$index]['calificacion'] ."> </td>";

                                         echo "</tr>";
                                        

                                    }
                                     ?>
                                    </table>
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                        <?php  
                        }else{
                        echo "<div class='card card-primary card-outline' style='text-align: center; opacity:1;'>";
                          echo "<div class='card-header'>";
                            echo "<h5 class='m-0'>Lista de alumnos a evaluar: </h5>";
                          echo "</div>";
                          echo "<div class='card-body'>";
                            echo "<h5 class='m-0'>No hay alumnos inscritos en este evento formativo. </h5>";
                            
                          echo "</div>";
                        echo "</div>";
                        }
                        ?>

                    
                   
                        <!-- Page Heading -->
                        
                        
                        
                        
                  
                        
                        <!-- /.row -->
                        <div class="cuadro"> 
                            <table style="margin-left: auto;margin-right: auto;">
                                <tr>
                                    <th><a href='/evaluaciones' class='btn btn-primary'>volver</a></th>
                                    <?php  
                                    if($listaParticipantes != null){
                                    ?>
                                    <th><input type="hidden" name="idEFI"  value=<?php echo $idEFI ?> ></input></th> 
                                    <th><button type="submit" onclick="guardarAprovados()" name="idEFI" class='btn btn-primary' value=<?php echo $idEFI ?> >Guardar</button></th> 
                                    <?php  
                                    }
                                    ?>
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
        function guardarAprovados() {
                    
                    <?php  
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $evaluacion = new Evaluacion();
                        $apr = $_POST['apr'];
                        $idEFI = $_POST['idEFI'];


                   
                        $base = $evaluacion->guardarEvaluacionParticipante($idEFI,$apr,1);
                        
                    }

                    
                       
                    ?>    
                    
          
        }

        function guardarReprobados() {
                    
                    <?php  
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $evaluacion = new Evaluacion();
                        $rep = $_POST['rep'];
                        $idEFI = $_POST['idEFI'];
                   
                        $base = $evaluacion->guardarEvaluacionParticipante($idEFI,$rep,0);
                        
                    }

                    
                        
                    ?>   
                    
          
        }

        function guardarCalificacion(){
            <?php  
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $cont = 0;
                        $evaluacion = new Evaluacion();
                        $idEFI = $_POST['idEFI'];
                        $calif = $_POST['calif'];

#
                        foreach($listaEvento as $elemento){
                            $actualizar = $evaluacion->guardarCalificacionParticipante($idEFI,$elemento['idUsuario'],$calif[$cont]);
                            $cont++;
                        }
                        

                        
                        
                    }



                        #guardarAutoevaluacion($idEFP,$idUsuario,$valores[0],$valores[1],$valores[2],$valores[3],$valores[4]);
                 ?>
        }

       

        
    </script>

    </body>
</html>
@endsection
