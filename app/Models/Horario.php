<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['dia', 'hora_inicio', 'hora_fin', 'cancha_id', 'user_id'];
    protected $table = 'horario';

    public function cancha()
    {
        return $this->belongsTo(Cancha::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
