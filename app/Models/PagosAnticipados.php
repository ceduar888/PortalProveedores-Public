<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagosAnticipados extends Model
{
    use HasFactory;

    protected $table = 'pagos_anticipados';
    protected $fillable = [
        'nombre'
    ];

    public function provPagosAnticipados()
    {
        return $this->hasMany(Proveedor::class, 'cmpFrecPagoAntic');
    }
}
