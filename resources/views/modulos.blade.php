<!DOCTYPE html>
@extends('layout.layout')
@section('content')

<link href="{{ URL::asset('/css/modulos.css') }}" rel="stylesheet">

<?php
    require ('C:\laragon\www\SistemaEventosFormativos\public\ControladorModulos.php');

    $modulo = new Modulo();

    $listaModulo = $modulo->listaTodosModulos();
?>

<title>Lista de Módulos</title>

<div class="titulo">
    <h1>Lista de Módulos</h1>
</div>
<div class="caja">
    <div class="formularioModulo">
        <table class='tabla'>
            <thead class="tablehead">
                <tr>
                    <th>Nombre</th>
                    <th>Contenido</th>
                    <th>Duración (hrs)</th>
                </tr>
            </thead>
            <tbody class="tablebody">
                <?php
                    if($listaModulo != null){
                        foreach($listaModulo as $elemento){
                            echo "<tr>";
                            echo "<td>" . $elemento['nombreModulo'] . "</td>";
                            echo "<td>" . $elemento['contenidoModulo'] . "</td>";
                            echo "<td>" . $elemento['duracionModulo'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan=3>No existe ningún módulo todavía.</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
            <div class="botoncito">
                <form>
                    <button type="submit" formaction="agregarmodulo">Agregar</button>
                </form>
            </div>
    </div>
</div>
@endsection
