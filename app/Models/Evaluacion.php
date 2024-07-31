<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluacion';

    protected $primaryKey = 'IdEvaluacion';

    protected $fillable = [
        'IdPlan',
        'FechaEvaluacion',
        'Resultado',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
