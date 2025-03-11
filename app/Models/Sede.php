<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nombre', 'telefono', 'email', 'direccion', 'distrito_id', 'user_id'];
    protected $table = 'sede';

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}