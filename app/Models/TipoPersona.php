<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_persona';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'valor'
    ];

    // Relaciones
    public function proveedor()
    {
        return $this->hasMany(Proveedor::class, 'id', 'fel_tipo_persona');
    }
}
