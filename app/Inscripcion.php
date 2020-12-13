<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table='detalleeventoparticipante';

    protected $fillable =['idEF','idUsuario','aprobado'];
    public $timestamps = false;
    /**
     * Relacion de la tabla categoria con la tabla academico
     */

    /**
     * Relacion 1 a muchos de la tabla categoria con la tabla planes
     */


    /**
     * Relacion 1 a muchos de la tabla categoria con la tabla recomendaciones
     */

}
