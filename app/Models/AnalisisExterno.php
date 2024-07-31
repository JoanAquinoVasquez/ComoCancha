<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalisisExterno extends Model
{
    protected $table = 'analisis_externo';

    protected $primaryKey = 'IdAnalisisExterno';

    protected $fillable = [
        'IdPlan',
        'Oportunidades',
        'Amenazas',
    ];

    public function planEstrategico()
    {
        return $this->belongsTo(PlanEstrategico::class, 'IdPlan', 'IdPlan');
    }

    // Define otras relaciones y métodos según sea necesario
}
