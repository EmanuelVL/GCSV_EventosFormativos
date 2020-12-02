<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Informacion</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="cuadrologin">
            <a href="registro">Login</a>
        </div>
        <div class="topnav">
            <img src="{{ URL::asset('img/logo-institucional.jpg') }}" height="150" width="150" alt="logo">
            <div class="anclas">
                <a href="home">Principal</a>
                <a href="eventos">Eventos Formativos</a>
                <a href="eventospersonales">Tus Eventos</a>
                <a class="active" href="informacion">Información</a>
            </div>
        </div>
    </body>
</html>
