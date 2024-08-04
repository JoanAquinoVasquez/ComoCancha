<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['fecha_reserva', 'hora_inicio', 'hora_fin', 'estado', 'user_id', 'cancha_id'];
    protected $table = 'reserva';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cancha()
    {
        return $this->belongsTo(Cancha::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}