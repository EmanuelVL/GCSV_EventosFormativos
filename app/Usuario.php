<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    //use Notifiable;
    public $timestamps = false;
    protected $table='usuario';
    protected $primaryKey = 'idUsuario';
    protected $fillable =['nombreUsuario','apellidoUsuario','correo','password','esInstancia'];
    //protected $hidden = ['password', 'remember_token',];


}

