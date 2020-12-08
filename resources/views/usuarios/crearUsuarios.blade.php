@extends('layout.layout')

@section('content')
   <!-- Page Content -->
   <title> Crear Usuario </title>
  <div class="container ">
              <div class="card-body p-5">
            <h1>Crear Usuario</h1>
          <form method="POST" action='{{route('gestionusuarios.store')}}'>
              @csrf

              <div class="form-group" {{ $errors->has('nombre') ? 'has-error' : ''}}>
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control"  name='nombreUsuario' placeholder="nombre usuario" required="">
                {!! $errors->first('nombre','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('apellido') ? 'has-error' : ''}}>
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control"  name='apellidoUsuario' placeholder="apellido usuario" required="">
                {!! $errors->first('apellido','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('correo') ? 'has-error' : ''}}>
                <label for="correo">Correo</label>
                <input type="email" class="form-control"  name='correo' placeholder="correo usuario" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+[.]+[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]*$" required="">
                {!! $errors->first('correo','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('password') ? 'has-error' : ''}}>
                <label for="password">Contraseña</label>
                <input type="password" name="password" rows="4" class='form-control' cols="50" name='password' required=""></input>
                {!! $errors->first('password','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group " {{ $errors->has('password-confirm') ? 'has-error' : ''}}>
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" name="password" rows="4" class='form-control' cols="50" name='password' name="password_confirmation" required=""></input>
                {!! $errors->first('password-confirm','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('instacia') ? 'has-error' : ''}}>
                <label for="instacia">Es Instancia (0) No y (1) Si</label>
                <input type="text" class="form-control"  name='esInstancia' placeholder="instacia usuario" required="">
                {!! $errors->first('instacia','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <div class="form-group" {{ $errors->has('instructor') ? 'has-error' : ''}}>
                <center><label for="instructor">Instructor</label></center>
                <input type="checkbox" size="10px" class="form-control"  name='instructor' placeholder="instacia usuario" value="1">
                {!! $errors->first('instructor','<span class="help-block" style="color:red;">:message</span>')!!}
              </div>

              <button type="submit" class="btn pretty-btn" style="float: left; background-color:green; color:white">Crear Usuario</button>
            </form>
        </div>
    </div>
@endsection