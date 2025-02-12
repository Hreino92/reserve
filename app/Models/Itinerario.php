<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    use HasFactory;

    protected $fillable = [
        'paquete_id', 'dia', 'descripcion'
    ];

    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}
