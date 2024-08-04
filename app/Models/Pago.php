<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'fecha', 'metodo', 'estado', 'reserva_id'];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}