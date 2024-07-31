<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    protected $table = 'estrategias';

    protected $primaryKey = 'IdEstrategia';

    protected $fillable = [
        'IdPlan',
        'Descripcion',
        'Responsable',
        'Recursos',
        'FechaInicio',
        'FechaFin',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
