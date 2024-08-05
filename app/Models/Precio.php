<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;
    
    protected $fillable = ['amount', 'cancha_id'];
    protected $table = 'precio';

    public function cancha()
    {
        return $this->belongsTo(Cancha::class);
    }
}
