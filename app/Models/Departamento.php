<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = [
        'code',
        'name'
    ];

    public function provDepartamento()
    {
        return $this->hasMany(Proveedor::class, 'fel_DeptoMH');
    }

    public function provDptoJob()
    {
        return $this->hasMany(Proveedor::class, 'cmpDptoJob');
    }
}
