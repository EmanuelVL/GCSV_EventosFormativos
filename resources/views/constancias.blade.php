<?php
    if(!(auth()->user())){
        header('Location: http://sistemaeventosformativos.test/');
        die();
    }
?>

<!DOCTYPE html>
@extends('layout.layout')
@section('content')

<link href="{{ URL::asset('/css/constancias.css') }}" rel="stylesheet">

<?php
    require ("C:/laragon/www/SistemaEventosFormativos/database/factories/herramientasConstancias.php");

    $constancia1 = new Constancia();
    $constancia2 = new Constancia();
    $constancia3 = new Constancia();
    $constancia4 = new Constancia();
    $constancia5 = new Constancia();
    $constancia6 = new Constancia();
    $constancia7 = new Constancia();
    $constancia8 = new Constancia();
    //$constancia9 = new Constancia();

    $idUsuario = auth()->user()->idUsuario; // Sesión

    //$listaUsuarios = $constancia9->verUsuarios();

    $listaEFTerminados = $constancia1->listaEventosTerminados($idUsuario);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['idEF'])){
            $idEF = $_POST['idEF'];

            $bandera = true;

            $autoeval = $constancia2->autoevaluacionRealizada($idEF, $idUsuario);
            $autoeval = $autoeval[0];

            $calificado = $constancia3->participantesCalificados($idUsuario);
            $calificado = $calificado[0];

            $evalprograma = $constancia4->evaluacionprogramaRealizada($idEF, $idUsuario);
            $evalprograma = $evalprograma[0];

            $evaldocente = $constancia5->evaluaciondocenteRealizada($idEF, $idUsuario);
            $evaldocente = $evaldocente[0];

            $aprobado = $constancia6->participanteAprobado($idEF, $idUsuario);
            $aprobado = $aprobado[0];

            $usuario = $constancia7->selectUsuario($idUsuario);
            $usuario = $usuario[0];

            $EF = $constancia8->selectEF($idEF);
            $EF = $EF[0];

            switch ($EF['mesInicio']) {
                case 1:
                $mesInicio = 'Enero';
                break;
                case 2:
                $mesInicio = 'Febrero';
                break;
                case 3:
                $mesInicio = "Marzo";
                break;
                case 4:
                $mesInicio = "Abril";
                break;
                case 5:
                $mesInicio = "Mayo";
                break;
                case 6:
                $mesInicio = "Junio";
                break;
                case 7:
                $mesInicio = "Julio";
                break;
                case 8:
                $mesInicio = "Agosto";
                break;
                case 9:
                $mesInicio = "Septiembre";
                break;
                case 10:
                $mesInicio = "Octubre";
                break;
                case 11:
                $mesInicio = "Noviembre";
                break;
                case 12:
                $mesInicio = "Diciembre";
                break;
            }

            switch ($EF['mesFinal']) {
                case 1:
                $mesFinal = 'Enero';
                break;
                case 2:
                $mesFinal = 'Febrero';
                break;
                case 3:
                $mesFinal = "Marzo";
                break;
                case 4:
                $mesFinal = "Abril";
                break;
                case 5:
                $mesFinal = "Mayo";
                break;
                case 6:
                $mesFinal = "Junio";
                break;
                case 7:
                $mesFinal = "Julio";
                break;
                case 8:
                $mesFinal = "Agosto";
                break;
                case 9:
                $mesFinal = "Septiembre";
                break;
                case 10:
                $mesFinal = "Octubre";
                break;
                case 11:
                $mesFinal = "Noviembre";
                break;
                case 12:
                $mesFinal = "Diciembre";
                break;
            }
        }
    }
?>
<title>Tus Constancias</title>

<div class="titulo">
    <h1>Tus Constancias</h1>
</div>
<div class="listaeventos">
    <form method="POST">
        @csrf
        <div class="lista">
            <table>
                <thead class="tablatitulo">
                    <tr>
                        <th>Tus Eventos Formativos terminados</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="opciones">
                <?php
                    if($listaEFTerminados != null){
                        foreach($listaEFTerminados as $elemento){
                            echo "<tr>";
                            echo "<td>" . $elemento['nombreEF'] . "</td>";
                            echo "<td><input type='radio' id='seleccion' name='idEF' value=" . $elemento['idEF'] . " required></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan=2>No estás inscrito a ningún Evento Formativo o estos aún no terminan.</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="botoncito">
            <button type="submit" name="boton" <?php echo isset($listaEFTerminados) && $listaEFTerminados != null?'':'disabled';?>>Ver Constancia</button>
        </div>
    </form>
</div>
<div class="cuadroconst">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($EF)){
            if($autoeval['autoeval'] == 0){
                if($bandera == true) echo "<span style='font-size:20px'>Seleccionaste el Evento Formativo: <span style='font-weight:bold'>" . $EF['nombreEF'] . "</span></span>";
                echo "<div class='alerta'>";
                echo "No has realizado tu autoevaluación.";
                echo "</div>";
                $bandera = false;
            }
            if($evaldocente['evaldoc'] == 0){
                if($bandera == true) echo "<span style='font-size:20px'>Seleccionaste el Evento Formativo: <span style='font-weight:bold'>" . $EF['nombreEF'] . "</span></span>";
                echo "<div class='alerta'>";
                echo "No has realizado la evaluación a tu instructor.";
                echo "</div>";
                $bandera = false;
            }
            if($evalprograma['evalpro'] == 0){
                if($bandera == true) echo "<span style='font-size:20px'>Seleccionaste el Evento Formativo: <span style='font-weight:bold'>" . $EF['nombreEF'] . "</span></span>";
                echo "<div class='alerta'>";
                echo "No has realizado la evaluación al programa.";
                echo "</div>";
                $bandera = false;
            }
            if($calificado['calificacion'] == 0){
                if($bandera == true) echo "<span style='font-size:20px'>Seleccionaste el Evento Formativo: <span style='font-weight:bold'>" . $EF['nombreEF'] . "</span></span>";
                echo "<div class='alerta'style='background-color:#ff8000'>";
                echo "El instructor no te ha evaluado.";
                echo "</div>";
                $bandera = false;
            }
            if($aprobado['aprobado'] == 0){
                if($bandera == true) echo "<span style='font-size:20px'>Seleccionaste el Evento Formativo: <span style='font-weight:bold'>" . $EF['nombreEF'] . "</span></span>";
                echo "<div class='alerta'>";
                echo "No aprobaste este Evento Formativo.";
                echo "</div>";
                $bandera = false;
            }
            if($bandera == true){
                echo "<div class='constancia'>";
                echo "<img src='http://sistemaeventosformativos.test/\img\unisonescudo.gif' height='120' width='120' alt='logo'><br>";
                echo "<h1><span style='line-height:60px'>Constancia</span></h1>";
                echo "<p>Esta constancia demuestra que <span style='text-decoration:underline'>" . $usuario['nombreUsuario'] . " " . $usuario['apellidoUsuario'] . "</span> ha completado el Evento Formativo <span style='font-weight:bold'> \"" . $EF['nombreEF'] . "\"</span> de manera satisfactoria.<br><span style='font-size:13px'>Del día ".$EF['diaInicio']." de ".$mesInicio." al día ".$EF['diaFinal']." de ".$mesFinal." con un total de " . $EF['duracion'] . " horas.</span></p>";
                echo "</div>";
            }
        } else {
            echo "<span style='font-size:20px;text-align:center'>← Selecciona un Evento Formativo para ver tu constancia.</span>";
        }
    ?>
</div>
@endsection
