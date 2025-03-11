<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_empresa_table extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    protected $table = 'empresa';

    public function user()
    {
        return $this->hasMany(User::class);
    }
    
}
