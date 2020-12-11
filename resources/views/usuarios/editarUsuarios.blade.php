@extends('layout.layout')
@section('content')
<title>Editar-{{$usuario->nombreUsuario}}</title>
    <div class="card border-0 shadow my-5 background-style">
        <div class="card-body p-5">
            <h1 style="text-align:center">Editar usuario: {{$usuario->nombreUsuario}}</h1><br><br>
            <form method= "POST" action="{{ route('gestionusuarios.update', $usuario->idUsuario) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nombreUsuario" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                    <div class="col-md-6">
                        <input id="nombreUsuario" type="text" class="form-control" name="nombreUsuario" value="{{$usuario->nombreUsuario}}" required>
                        {!! $errors->first('nombreUsuario','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellidoUsuario" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                    <div class="col-md-6">
                        <input id="apellidoUsuario" type="text" class="form-control" name="apellidoUsuario" value="{{$usuario->apellidoUsuario}}">
                        {!! $errors->first('nombre','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                    <div class="col-md-6">
                        <input id="correo" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+[.]+[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]*$" name="correo" value="{{$usuario->correo}}" required>
                        {!! $errors->first('email', '<span style="color:red;">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{$usuario->password}}" required>
                        {!! $errors->first('password','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$usuario->password}}">
                    </div>
                </div>

                @if($usuario->esAdmin != 1)
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="administrador" name='esAdmin' value="1">
                        <label class="custom-control-label" for="administrador">Administrador</label>
                        {!! $errors->first('administrador','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                @else
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="administrador" checked name='esAdmin' value="1">
                        <label class="custom-control-label" for="administrador">Administrador</label>
                        {!! $errors->first('administrador','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                @endif

                @if($usuario->esInstancia != 1)
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="instancia" name='esInstancia' value="1">
                        <label class="custom-control-label" for="instancia">Instancia</label>
                        {!! $errors->first('instancia','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                @else
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="instancia" checked name='esInstancia' value="1">
                        <label class="custom-control-label" for="instancia">Instancia</label>
                        {!! $errors->first('instancia','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                @endif

                @if($usuario->esInstructor != 1)
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="instructor" name='esInstructor' value="1">
                        <label class="custom-control-label" for="instructor">Instructor</label>
                        {!! $errors->first('instructor','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                @else
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="instructor" checked name='esInstructor' value="1">
                        <label class="custom-control-label" for="instructor">Instructor</label>
                        {!! $errors->first('instructor','<span class="help-block" style="color:red;">:message</span>')!!}
                    </div>
                @endif

                <div class="form-group row mb-4">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-info" style="float:right">
                                <span class="fa fa-edit"></span>
                            {{ __('Editar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var password, password2;

        password = document.getElementById('password');
        password2 = document.getElementById('password-confirm');

        password.onchange = password2.onkeyup = passwordMatch;

        function passwordMatch() {
            if(password.value !== password2.value)
                password2.setCustomValidity('Las contraseñas no coinciden.');
            else
                password2.setCustomValidity('');
        }
    </script>
@stop
