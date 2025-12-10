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
        Schema::table('comentarios', function (Blueprint $table) {
            $table->text('Tusuario_comentario')->nullable()->after('Testado_fisico_comentario');
            $table->text('TusuCargo_comentario')->nullable()->after('Tusuario_comentario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropColumn([
                'Tusuario_comentario',
                'TusuCargo_comentario'
            ]);
        });
    }
};
