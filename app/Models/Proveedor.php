<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    protected $fillable = [
        'fel_tipo_persona',
        'CardName', 
        'CardFName' , 
        'cmpTipoDoc' , 
        'cmpNumDoc', 
        'Phone1' , 
        'Cellular' ,
        'fel_emailDTE', 
        'usuario_id',
        'TipoCont',
        'cmpNacionalidad',
        'cmpPaisNac',
        'cmpLugarNac',
        'cmpEstFamiliar',
        'fel_nombrePAISDTE',
        'cmpFuenteIng',
        'fel_PAISDTE',
        'fel_DeptoMH',
        'fel_MunicipioMH',
        'fel_codMunicMH',
        'fel_DireccionDTE',
        'BankCode',
        'numero_cuenta',
        'tipo_cuenta',
        'cmpLugarExp',
        'cmpFechaExp',
        'cmpFechaVencDoc',
        'cmpActEcon',
        'fel_ActivEconMH',
        'cmpIngreMensual',
        'cmpEsAPNFD',
        'cmpEsPEP',
        'cmpCargoPEP',
        'cmpPEPDesde',
        'cmpPEPHasta',
        'cmpLugarTrabajo',
        'cmpDptoJob',
        'cmpMunicJob',
        'cmpDirLugTrab',
        'cmpCargoDesemp',
        'cmpEmailJob',
        'cmpCelularJob',
        'cmpFuenteIngOtros',
        'cmpLugarTrabOtro',
        'cmpCargoOtro',
        'cmpEmailOtro',
        'cmpIngreAdic',
        'fel_incoterms',
        'fel_descIncoterms',
        'cmpInscripcionRC',
        'cmpInscripcionRL',
        'fel_RecintoFiscal',
        'fel_regimen',
        'cmpYearsOperando',
        'cmpNumEmpleados'
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipoPersona()
    {
        return $this->belongsTo(TipoPersona::class,'fel_tipo_persona', 'id');
    }

    public function tipoContribuyente()
    {
        return $this->belongsTo(TipoContribuyente::class, 'TipoCont');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'cmpNacionalidad');
    }

    public function paisNac()
    {
        return $this->belongsTo(Pais::class, 'cmpPaisNac');
    }

    public function paisDTE()
    {
        return $this->belongsTo(Pais::class, 'fel_nombrePAISDTE');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'fel_DeptoMH');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'fel_MunicipioMH');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'cmpTipoDoc');
    }

    public function giros()
    {
        return $this->belongsTo(Giro::class, 'fel_ActivEconMH');
    }

    public function ingresos()
    {
        return $this->belongsTo(Ingresos::class, 'cmpIngreMensual');
    }

    public function activApnfd()
    {
        return $this->belongsTo(APNFD::class, 'cmpEsAPNFD');
    }

    public function cargo()
    {
        return $this->belongsTo(CargoDesempenado::class, 'cmpCargoPEP');
    }

    public function pago()
    {
        return $this->belongsTo(PagosAnticipados::class, 'cmpFrecPagoAntic');    
    }

    public function fuenteIngresos()
    {
        return $this->belongsTo(FuenteIngresos::class, 'cmpFuenteIng');
    }

    public function dptoTrabajo()
    {
        return $this->belongsTo(Departamento::class, 'cmpDptoJob');
    }

    public function municTrabajo()
    {
        return $this->belongsTo(Municipio::class, 'cmpMunicJob');
    }

    public function ingresosAdic()
    {
        return $this->belongsTo(Ingresos::class, 'cmpIngreAdic');
    }

    public function fuenteIngOtros()
    {
        return $this->belongsTo(Ingresos::class, 'cmpFuenteIngOtros');
    }

    public function incoterm()
    {
        return $this->belongsTo(Incoterms::class, 'fel_incoterms');
    }

    public function regimen()
    {
        return $this->belongsTo(Regimen::class, 'fel_regimen');
    }

    public function recinto()
    {
        return $this->belongsTo(RecintoFiscal::class, 'fel_RecintoFiscal');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'BackCode');
    }
}
