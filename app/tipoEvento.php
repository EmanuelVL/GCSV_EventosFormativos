<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tipoEvento extends Authenticatable
{
    //use Notifiable;
    public $timestamps = false;
    protected $table='tipoevento';
    protected $primaryKey = 'idTipo';
    protected $fillable =['nombreTipo','minModulos','minHoras'];
    //protected $hidden = ['password', 'remember_token',];

    

}
