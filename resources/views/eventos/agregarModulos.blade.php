<!DOCTYPE html>
@extends('layout.layout')
@section('content')

<link href="{{ URL::asset('/css/agregarmodulo.css') }}" rel="stylesheet">

<title>Agregar Módulo</title>

<div class="titulo">
    <h1>Agregar Módulo</h1>
</div>
<form method= "POST" action="{{route('modulos.store')}}">
         @csrf
<div class="caja">
    <div class="formularioModulo">
        
            <label for="nombreModulo">Nombre del módulo:</label><br>
            <input type="text" id="nombreModulo" name="nombreModulo" class="entrada" required>
            <br><br>
            <label for="contenidoModulo" >Contenido del módulo:</label><br>
            <textarea class="entrada" placeholder="- Tema 1&#10;- Tema 2&#10;- Tema 3" id="contenidoModulo" name="contenidoModulo" rows="4" style="vertical-align:top;resize:none" required></textarea>
            <br><br>
            <label for="duracion">Duración del módulo (horas): </label><br>
            <input class="entrada" type="number" id="duracion" name="duracion" min='1' value='1' required><br><br>
            <div class="botoncito">
                <button type="submit" name="boton">Agregar</button>
            </div>
        </form>
    </div>
</div>
@endsection