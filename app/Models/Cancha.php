<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'ubicacion', 'precioporhora', 'descripcion', 'users_id', 'deporte_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deporte()
    {
        return $this->belongsTo(Deporte::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}