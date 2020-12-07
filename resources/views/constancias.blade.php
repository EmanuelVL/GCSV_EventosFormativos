<!DOCTYPE html>
@extends('layout.layout')
@section('content')
<?php
    require ("C:/laragon/www/SistemaEventosFormativos/database/factories/herramientasEF.php");

    $constancia1 = new Constancia();
    $constancia2 = new Constancia();
    $constancia3 = new Constancia();
    $constancia4 = new Constancia();
    $constancia5 = new Constancia();

    $idUsuario = 1;

    $listaEFTerminados = $constancia1->listaEventosTerminados($idUsuario);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $idEF = $_POST['idEF'];

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
<title>Tus Constancias</title>

<div class="titulo">
    <h1>Selecciona el Evento Formativo</h1>
</div>
<div class="cuadro">
    <form method="POST">
        @csrf
        <div class="listaeventos">
            <table>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
                <?php
                    if($listaEFTerminados != null){
                        foreach($listaEFTerminados as $elemento){
                            echo "<tr>";
                            echo "<td>" . $elemento['idEF'] . "</td>";
                            echo "<td>" . $elemento['nombreEF'] . "</td>";
                            echo "<td><input type='radio' id='seleccion' name='idEF' value=" . $elemento['idEF'] . " required></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan=2>No tienes Eventos Formativos o aún no terminan</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <button type="submit" name="boton">Ver Constancia</button>
        </div>
    </form>
    <div class="constanciaprint">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if($autoeval == 0){
                    echo "<p> No has realizado la autoevaluacion</p>";
                    $bandera = false;
                }
                if($evaldocente == 0){
                    echo "<p> No has realizado la evaluacion a tu instructor</p>";
                    $bandera = false;
                }
                if($evalprograma == 0){
                    echo "<p> No has realizado la evaluacion al programa</p>";
                    $bandera = false;
                }
                if($calificado == 0){
                    echo "<p> Tu instructor no te ha evaluado</p>";
                    $bandera = false;
                }
                if($bandera == true){
                    echo "<p>Ye</p>";
                }
            } else {
                echo "<p>Selecciona un Evento Formativo para ver tu constancia</p>";
            }
        ?>
    </div>
</div>

@endsection
