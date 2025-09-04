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
        Schema::table('proveedor', function (Blueprint $table) {
            $table->string('numero_cuenta')->nullable();
            $table->string('tipo_cuenta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proveedor', function (Blueprint $table) {
            $table->dropColumn('numero_cuenta');
            $table->dropColumn('tipo_cuenta');
        });
    }
};
