<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    use HasFactory;

    protected $table = 'ingresos';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provIngresos()
    {
        return $this->hasMany(Proveedor::class, 'cmpIngreMensual');
    }

    public function provIngresosAdic()
    {
        return $this->hasMany(Proveedor::class, 'cmpIngreAdic');
    }
}
