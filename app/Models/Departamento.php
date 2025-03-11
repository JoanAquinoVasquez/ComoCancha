<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
    protected $table = 'departamento'; // Asegúrate de que esta línea esté presente


    public function provincias()
    {
        return $this->hasMany(Provincia::class);
    }

}
