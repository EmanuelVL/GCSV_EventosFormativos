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
    $idUsuario = 2;
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $idEFI = $_GET['idEFI'];
        #$idUsuario = $_GET['idU'];
        

    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $idEFI = $_POST['idEFI'];
        #$idUsuario = $_GET['idU'];
        

    }

    $evaluacion1 = new Evaluacion();
    $listaParticipantes = $evaluacion1->participantes($idEFI);
    $listaEvento = $evaluacion1->participantesEF($idEFI);;

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
                            <h1 class="titulo">Evaluación de participanes</h1>
                        </div>
                   
                        <!-- Page Heading -->
                        
                        
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
                                                <td style='padding:0 30px 0 30px;'>Aprobar</td>
                                                <td style='padding:0 30px 0 30px;'>Aprobado</td>
                                                
                                                
                                            </tr>
                                            <?php
                                    foreach($listaParticipantes as $index => $elemento){
                                        echo "<tr>";
                                        
                                        echo "<td>" . $elemento['nombreUsuario'] . "</td>";
                                        echo "<td>" . $elemento['apellidoUsuario']. "</td>";
                                        

                                         echo "<td><button type='submit' onclick='guardarAprovados()' name='apr'  value=" . $elemento['idUsuario'] . " >   </td>";

                                         if($listaEvento[$index]['aprobado']){
                                            echo "<th style='padding:0 30px 0 30px;'>SI</th>";
                                         }else{
                                            echo "<th style='padding:0 30px 0 30px;'>NO</th>";
                                         }
                                         
                                        
                                         echo "</tr>";
                                        

                                    }
                                     ?>
                                    </table>
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                       

                    
                   
                        <!-- Page Heading -->
                        
                        
                        
                        
                  

                        <!-- /.row -->
                        <div class="cuadro"> 
                            <table style="margin-left: auto;margin-right: auto;">
                                <tr>
                                    <th><a href='/evaluaciones' class='btn btn-primary'>volver</a></th>
                                    <th><input type="hidden" name="idEFI"  value=<?php echo $idEFI ?> ></input></th> 
                                    <th><button onclick="guardarAprovados()" name="idEFI" class='btn btn-primary' value=<?php echo $idEFI ?> >Guardar</button></th> 
                                </tr>
                            </table>
                            <p id="demo"></p>
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
                   
                        $base = $evaluacion->guardarEvaluacionParticipante($idEFI,$apr);
                        
                    }
                        
                    ?>    
          
        }

       

        
    </script>

    </body>
</html>
@endsection