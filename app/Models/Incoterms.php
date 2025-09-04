<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoterms extends Model
{
    use HasFactory;

    protected $table = 'icoterms';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provIncoterms()
    {
        return $this->hasMany(Proveedor::class, 'fel_incoterms');
    }
}
