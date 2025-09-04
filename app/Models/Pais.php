<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo'
    ];

    public function provPaises()
    {
        return $this->hasMany(Proveedor::class, 'cmpNacionalidad');
    }

    public function provPaisNac()
    {
        return $this->hasMany(Proveedor::class, 'cmpPaisNac');
    }

    public function provPaisDTE()
    {
        return $this->hasMany(Proveedor::class, 'fel_nombrePAISDTE');
    }
}
