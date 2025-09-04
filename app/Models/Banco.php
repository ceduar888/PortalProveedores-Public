<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    protected $table = 'banco';
    protected $fillable = [
        'region',
        'codigo',
        'nombre'
    ];

    public function bancoProveedor()
    {
        return $this->hasMany(Proveedor::class, 'BackCode');
    }
}
