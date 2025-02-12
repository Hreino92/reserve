<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    // Definir la tabla asociada (opcional si el nombre es plural en inglés)
    protected $table = 'hotels';

    // Campos que son asignables masivamente
    protected $fillable = [
        'name',
        'address',
        'image',
        'category',
        'description',
    ];

    // Si no utilizas las marcas de tiempo
    public $timestamps = true;
}
