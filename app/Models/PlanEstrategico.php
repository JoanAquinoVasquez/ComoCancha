<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanEstrategico extends Model
{
    protected $table = 'plan_estrategico';

    protected $primaryKey = 'IdPlan';

    protected $fillable = [
        'Vision',
        'Mision',
        'Valores',
        'FechaCreacion',
        'Archivo',
    ];

    public function objetivosEstrategicos()
    {
        return $this->hasMany(ObjetivoEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
