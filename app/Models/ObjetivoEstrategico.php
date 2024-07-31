<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoEstrategico extends Model
{
    protected $table = 'objetivos_estrategicos';

    protected $primaryKey = 'IdObjetivo';

    protected $fillable = [
        'IdPlan',
        'Descripcion',
        'FechaInicio',
        'FechaFin',
        'Estado',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
