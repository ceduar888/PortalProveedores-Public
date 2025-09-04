<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    use HasFactory;

    protected $table = 'regimen_exportacion';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provRegimen()
    {
        return $this->hasMany(Proveedor::class, 'fel_regimen');
    }
}
