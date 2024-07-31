<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicadores';

    protected $primaryKey = 'IdIndicador';

    protected $fillable = [
        'IdPlan',
        'Descripcion',
        'ValorMeta',
        'ValorActual',
        'FechaMedicion',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
