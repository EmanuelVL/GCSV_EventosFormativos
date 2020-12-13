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
                        <input id="apellidoUsuario" type="text" class="form-control" name="apellidoUsuario" value="{{$usuario->apellidoUsuario}}" required>
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

                <!--
                {{--
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$usuario->password}}">
                    </div>
                </div>
                --}}
                -->

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
@stop