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
        Schema::create('anexos', function (Blueprint $table) {
            $table->id();
            $table->string('duiRepLeg')->nullable();
            $table->string('pasaport')->nullable();
            $table->string('idTribuRepLeg')->nullable();
            $table->string('credeAdmiJD')->nullable();
            $table->string('constSociedad')->nullable();
            $table->string('matriComVige')->nullable();
            $table->string('compDomicilioEmp')->nullable();
            $table->string('actaConsti')->nullable();
            $table->string('nitRegFisc')->nullable();
            $table->string('ftcpPoder')->nullable();
            $table->string('duiNitApode')->nullable();
            $table->string('declaRent')->nullable();
            $table->string('declaIva')->nullable();
            $table->string('estaFinan')->nullable();
            $table->string('estaBanc')->nullable();
            $table->string('refBanc')->nullable();
            $table->string('constSueldo')->nullable();
            $table->string('soportIngExtra')->nullable();
            $table->string('compDomicilio')->nullable();
            $table->string('tarjRegFisc')->nullable();
            $table->string('compVent')->nullable();
            $table->string('donac')->nullable();
            $table->string('presta')->nullable();
            $table->string('currEmp')->nullable();
            $table->string('listProyect')->nullable();
            $table->unsignedBigInteger('id_proveedor');

            $table->foreign('id_proveedor')->references('id')->on('proveedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anexos');
    }
};
