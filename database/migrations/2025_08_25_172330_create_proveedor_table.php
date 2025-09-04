<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedor', function (Blueprint $table) {
            // Registro
            $table->id();
            $table->string('CardName');
            $table->string('CardFName')->nullable();
            $table->string('cmpNumDoc')->nullable(); //PASO1. Numero documento
            $table->string('Phone1')->nullable(); //PASO1
            $table->string('Cellular')->nullable(); //PASO1
            $table->string('fel_emailDTE')->nullable(); // Correo
            $table->unsignedBigInteger('cmpTipoDoc')->nullable(); //PASO1.  Tipo documento
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('fel_tipo_persona'); //

            // Solicitud completa
            $table->string('cmpLugarNac')->nullable();  //PASO1. Lugar fecha nacimiento
            $table->string('fel_PAISDTE')->nullable(); // Resi. Codigo pais
            $table->string('cmpEstFamiliar')->nullable(); //PASO1. Estado civil
            $table->string('fel_codMunicMH')->nullable(); // Resi. Codigo Municipio
            $table->string('fel_DireccionDTE')->nullable(); //PASO1. Resi. Direccion completa
            $table->string('cmpActEcon')->nullable(); // PASO2. Profesion
            $table->string('cmpLugarExp')->nullable(); //PASO1. Lugar expedidicion doc
            $table->date('cmpFechaExp')->nullable(); //PASO1. Fecha expedidicion doc
            $table->date('cmpFechaVencDoc')->nullable(); //PASO1. Fecha venc doc
            $table->string('cmpYearsOperando')->nullable(); // Años operando
            $table->string('cmpNumEmpleados')->nullable(); // numero de empleado
            $table->string('cmpEsPEP')->nullable(); //PASO2. PEP 
            $table->date('cmpPEPDesde')->nullable(); //PASO2. desde
            $table->date('cmpPEPHasta')->nullable(); //PASO2. hasta
            $table->decimal('cmpMontoPagoAntic')->nullable(); //PASO2. monto pagos anticipados

            // Nullables foreign
            $table->unsignedBigInteger('cmpCargoPEP')->nullable(); //PASO2. cargo desempeñado
            $table->unsignedBigInteger('TipoCont')->nullable(); //PASO1. Tipo Contribuyente *
            $table->unsignedBigInteger('cmpNacionalidad')->nullable(); //PASO1. Nacionalidad *
            $table->unsignedBigInteger('cmpPaisNac')->nullable(); //PASO1. Pais NAcimiento
            $table->unsignedBigInteger('fel_nombrePAISDTE')->nullable(); //PASO1. Resi. Pais
            $table->unsignedBigInteger('fel_MunicipioMH')->nullable(); //PASO1. Resi. Municipio
            $table->unsignedBigInteger('fel_ActivEconMH')->nullable(); //PASO2 Giro / Act. economica
            $table->unsignedBigInteger('cmpIngreMensual')->nullable(); //PASO2. Rango ingresos mensuales 
            $table->unsignedBigInteger('cmpEsAPNFD')->nullable(); //PASO2. APNFD cmpFrecPagoAntic
            $table->unsignedBigInteger('cmpFrecPagoAntic')->nullable(); //PASO2. Frecu. pagos anticipados 
            $table->unsignedBigInteger('BackCode')->nullable(); //Banco

            // P. Natural
            $table->unsignedBigInteger('cmpFuenteIng')->nullable(); // P.Natural Fuente de ingresos
            $table->string('cmpLugarTrabajo')->nullable(); // P.Natural nombre de la empresa 
            $table->unsignedBigInteger('cmpDptoJob')->nullable(); // P.Natural departamento 
            $table->unsignedBigInteger('fel_DeptoMH')->nullable(); //PASO1. Resi. Departamento
            $table->unsignedBigInteger('cmpMunicJob')->nullable(); // P.Natural municipio
            $table->string('cmpDirLugTrab')->nullable(); // P.Natural direccion 
            $table->string('cmpCargoDesemp')->nullable(); // P.Natural cargo desempeñado 
            $table->string('cmpEmailJob')->nullable(); // P.Natural correo
            $table->string('cmpCelularJob')->nullable(); // P.Natural celular
            $table->unsignedBigInteger('cmpFuenteIngOtros')->nullable(); // Otros funetes de ingreso
            $table->string('cmpLugarTrabOtro')->nullable(); // Otros lugar trabajo 
            $table->string('cmpCargoOtro')->nullable(); // Otros cargo desempeñado
            $table->string('cmpEmailOtro')->nullable(); // Otros email
            $table->unsignedBigInteger('cmpIngreAdic')->nullable(); // Otros rango de ingresos

            // P. Juridica
            $table->unsignedBigInteger('fel_incoterms')->nullable(); // P. Juridica Incoterms  //Este es el codigo
            $table->string('fel_descIncoterms')->nullable(); // P. Juridica Codigo icoterms // Esta la descripcion
            $table->string('cmpInscripcionRC')->nullable(); // P. Juridica Num inscripcion registro 
            $table->string('cmpInscripcionRL')->nullable(); // P. Juridica Num inscripcion representante legal
            $table->unsignedBigInteger('fel_RecintoFiscal')->nullable(); // P. Juridica Recinto fiscal
            $table->unsignedBigInteger('fel_regimen')->nullable(); // P. Juridica Recinto fiscal

            $table->string('seleccionPEP')->nullable();
            $table->boolean('aceptado')->nullable();
            $table->boolean('completado')->nullable();

            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('fel_tipo_persona')->references('id')->on('tipo_persona');
            $table->foreign('TipoCont')->references('id')->on('tipo_contribuyente');
            $table->foreign('cmpNacionalidad')->references('id')->on('paises');
            $table->foreign('cmpPaisNac')->references('id')->on('paises');
            $table->foreign('fel_nombrePAISDTE')->references('id')->on('paises');
            $table->foreign('fel_MunicipioMH')->references('id')->on('municipios');
            $table->foreign('fel_ActivEconMH')->references('id')->on('giros');
            $table->foreign('cmpIngreMensual')->references('id')->on('ingresos');
            $table->foreign('cmpEsAPNFD')->references('id')->on('apnfd');
            $table->foreign('cmpFrecPagoAntic')->references('id')->on('pagos_anticipados');
            $table->foreign('cmpFuenteIng')->references('id')->on('fuente_ingresos');
            $table->foreign('cmpDptoJob')->references('id')->on('departamentos');
            $table->foreign('fel_DeptoMH')->references('id')->on('departamentos');
            $table->foreign('cmpMunicJob')->references('id')->on('municipios');
            $table->foreign('cmpFuenteIngOtros')->references('id')->on('fuente_ingresos');
            $table->foreign('cmpIngreAdic')->references('id')->on('ingresos');
            $table->foreign('fel_incoterms')->references('id')->on('icoterms');
            $table->foreign('fel_RecintoFiscal')->references('id')->on('recinto_fiscal');
            $table->foreign('fel_regimen')->references('id')->on('regimen_exportacion');
            $table->foreign('cmpTipoDoc')->references('id')->on('tipo_documento');
            $table->foreign('cmpCargoPEP')->references('id')->on('cargo_desempenado');
            $table->foreign('BackCode')->references('id')->on('banco');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};
