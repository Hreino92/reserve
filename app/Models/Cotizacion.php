<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    // Especificar el nombre de la tabla
    protected $table = 'cotizaciones';
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'tipo',
        'opcion_seleccionada',
        'ciudad_origen',
        'ciudad_destino',
        'equipaje',
        'clase_viaje',
        'fecha_inicio',
        'fecha_final',
        'comentarios'
    ];
}
