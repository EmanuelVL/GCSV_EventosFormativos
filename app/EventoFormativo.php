<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoFormativo extends Model
{
    protected $table='eventoformativo';
    protected $primaryKey = 'idEF';
    protected $fillable =['nombreEF','fechaInicio','fechaFinal', 'modalidad', 'idTipo', 'idInstructor', 'idInstancia', 'diseñoInstruccional', 'utilidadOportunidad','requisitosParticipacion','requisitosAcreditacion','condicionesOperativas','cuota','duracion'];
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