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
        Schema::create('b_digital', function (Blueprint $table) {
            $table->id('PK_B_Digital');

            $table->unsignedBigInteger('FK_B_Digital_AreaId');
            $table->foreign('FK_B_Digital_AreaId')
                    ->references('PK_Area')
                    ->on('areas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_B_Fisico_TipoId')->default(1);;
            $table->foreign('FK_B_Fisico_TipoId')
                    ->references('PK_Tipo')
                    ->on('tipos')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('FK_B_Digital_SistemaId');
            $table->foreign('FK_B_Digital_SistemaId')
                    ->references('PK_Sistema')
                    ->on('sistema')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('T_Nombre_Digital');
            $table->text('T_Host');
            $table->date('D_F_Inicio');
            $table->text('T_Determinacion');
            $table->date('D_F_Vencimiento')->nullable();
            $table->text('T_Estado_Digital')->default('Activo');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_b__digital');
    }
};
