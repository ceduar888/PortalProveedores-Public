<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APNFD extends Model
{
    use HasFactory;

    protected $table = 'apnfd';
    protected $fillable = [
        'codigo',
        'nombre'
    ];

    public function provApnfd()
    {
        return $this->hasMany(Proveedor::class, 'cmpEsAPNFD');
    }
}
