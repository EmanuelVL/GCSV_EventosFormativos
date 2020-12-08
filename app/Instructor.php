<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
	public $timestamps = false;
    protected $table='instructor';
    protected $primaryKey = 'idInstructor';
    protected $fillable =['idUsuario','CalidadProfesional','CalidadAcademica','curriculumSintetico','experiencia'];
}
