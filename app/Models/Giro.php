<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    use HasFactory;

    protected $table = 'giros';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provGiro()
    {
        return $this->hasMany(Proveedor::class, 'fel_ActivEconMH');
    }
}
