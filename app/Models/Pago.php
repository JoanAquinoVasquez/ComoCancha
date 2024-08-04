<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['monto', 'fecha', 'metodo', 'estado', 'reserva_id'];
    protected $table = 'pago';

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}