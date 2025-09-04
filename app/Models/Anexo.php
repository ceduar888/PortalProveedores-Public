<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    protected $table = 'anexos';
    protected $fillable = [
        'duiRepLeg',
        'pasaport',
        'idTribuRepLeg',
        'credeAdmiJD',
        'constSociedad',
        'matriComVige',
        'compDomicilioEmp',
        'actaConsti',
        'nitRegFisc',
        'ftcpPoder',
        'duiNitApode',
        'declaRent',
        'declaIva',
        'estaFinan',
        'estaBanc',
        'refBanc',
        'constSueldo',
        'soportIngExtra',
        'compDomicilio',
        'tarjRegFisc',
        'compVent',
        'donac',
        'presta',
        'currEmp',
        'listProyect',
        'id_proveedor',
    ];
}
