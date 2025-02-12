<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'imagen', 'duracion'
    ];

    public function itinerarios()
    {
        return $this->hasMany(Itinerario::class);
    }
}

