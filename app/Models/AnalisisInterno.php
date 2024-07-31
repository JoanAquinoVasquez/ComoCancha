<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalisisInterno extends Model
{
    protected $table = 'analisis_interno';

    protected $primaryKey = 'IdAnalisisInterno';

    protected $fillable = [
        'IdPlan',
        'Fortalezas',
        'Debilidades',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
