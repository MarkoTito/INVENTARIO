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
        Schema::table('bajas', function (Blueprint $table) {
            //
            $table->text('Tusuario_baja')->nullable()->after('Tdescripcion_null_baja');
            $table->text('Tcargo_baja')->nullable()->after('Tusuario_baja');
            $table->text('Tcontrato_baja')->nullable()->after('Tcargo_baja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bajas', function (Blueprint $table) {
            //
            $table->dropColumn([
                'Tusuario_baja',
                'Tcargo_baja',
                'Tcontrato_baja'
            ]);
        });
    }
};
