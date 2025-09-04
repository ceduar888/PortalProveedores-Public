<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteIngresos extends Model
{
    use HasFactory;

    protected $table = 'fuente_ingresos';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provFuenteIngresos()
    {
        return $this->hasMany(Proveedor::class, 'cmpFuenteIng');
    }

    public function provFuenteIngOtros()
    {
        return $this->hasMany(Proveedor::class, 'cmpFuenteIngOtros');
    }
}
