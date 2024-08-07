<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['tipo', 'direccion', 'precio_id', 'descripcion', 'user_id', 'deporte_id', 'sede_id', 'estado'];

    protected $table = 'cancha';

    public function precio()
    {
        return $this->hasOne(Precio::class, 'cancha_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deporte()
    {
        return $this->belongsTo(Deporte::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
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
