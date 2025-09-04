<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecintoFiscal extends Model
{
    use HasFactory;

    protected $table = 'recinto_fiscal';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provRecinto()
    {
        return $this->hasMany(Proveedor::class, 'fel_RecintoFiscal');
    }
}
