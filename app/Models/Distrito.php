<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'provincia_id'];
    protected $table = 'distrito';

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function sedes()
    {
        return $this->hasMany(Sede::class);
    }
}
