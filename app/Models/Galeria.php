<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descripcion',
        'image_path',
        'cancha_id',
    ];
    protected $table = 'galeria';

    public function cancha()
    {
        return $this->belongsTo(Cancha::class);
    }
}
