<?php

namespace App\Models\Registro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'precio',
        'kilometraje',
        'color',
        'email',
        'telefono',
        'fotografia'
    ];
}
