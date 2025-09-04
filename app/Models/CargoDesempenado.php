<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoDesempenado extends Model
{
    use HasFactory;

    protected $table = 'cargo_desempenado';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provCargoDesempenado()
    {
        return $this->hasMany(Proveedor::class, 'cmpCargoPEP');
    }
}
