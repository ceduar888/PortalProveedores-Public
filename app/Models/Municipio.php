<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $fillable = [
        'codigo',
        'nombre',
        'codigo_municipio',
        'departamento'
    ];

    public function provMunicipio()
    {
        return $this->hasMany(Proveedor::class, 'fel_MunicipioMH');
    }

    public function provMunicJob()
    {
        return $this->hasMany(Proveedor::class, 'cmpMunicJob');
    }
}
