<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documento';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provTipoDocumento()
    {
        return $this->hasMany(Proveedor::class, 'cmpTipoDoc');
    }
}
