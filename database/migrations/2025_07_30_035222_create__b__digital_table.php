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
        Schema::create('software', function (Blueprint $table) {
                
            $table->id('PK_Software');

            $table->unsignedBigInteger('FK_Software_AreaId');
            $table->foreign('FK_Software_AreaId')
                    ->references('PK_area')
                    ->on('areas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Software_TipoId')->default(1);;
            $table->foreign('FK_Software_TipoId')
                    ->references('PK_tipo')
                    ->on('tipos')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('FK_Software_SistemaId');
            $table->foreign('FK_Software_SistemaId')
                    ->references('PK_sistema')
                    ->on('sistemas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->unsignedBigInteger('FK_Software_EstadoId')->default(1);
            $table->foreign('FK_Software_EstadoId')
                    ->references('PK_estado')
                    ->on('estados')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->unsignedBigInteger('FK_Software_DeterminacionId');
            $table->foreign('FK_Software_DeterminacionId')
                    ->references('PK_determinacion')
                    ->on('determinaciones')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('Tnombre_software');
            $table->text('Thost_software');
            $table->date('Dfe_Inicio_software');
            //$table->text('Tdeterminacion_software');
            $table->date('Dfe_vencimiento_software')->nullable();
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
