<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Modulo extends Authenticatable
{
    //use Notifiable;
    public $timestamps = false;
    protected $table='modulo';
    protected $primaryKey = 'idModulo';
    protected $fillable =['idEF','nombreModulo','contenidoModulo','duracionModulo'];
    //protected $hidden = ['password', 'remember_token',];

    

}