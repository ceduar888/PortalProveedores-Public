<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContribuyente extends Model
{
    use HasFactory;

    protected $table = 'tipo_contribuyente';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    public function provContribuyente()
    {
        return $this->hasMany(Proveedor::class, 'TipoCont');
    }
}
