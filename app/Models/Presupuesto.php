<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuesto';

    protected $primaryKey = 'IdPresupuesto';

    protected $fillable = [
        'IdPlan',
        'MontoTotal',
        'FechaAprobacion',
        'Detalle',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
