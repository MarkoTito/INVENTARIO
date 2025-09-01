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
        Schema::create('Hardware', function (Blueprint $table) {
            $table->id('PK_Hardware');
            
            $table->unsignedBigInteger('FK_Hardware_AreaId');
            $table->foreign('FK_Hardware_AreaId')
                    ->references('PK_area')
                    ->on('areas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            
            $table->unsignedBigInteger('FK_Hardware_TipoId');
            $table->foreign('FK_Hardware_TipoId')
                    ->references('PK_tipo')
                    ->on('tipos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Hardware_UserId')->nullable();
            $table->foreign('FK_Hardware_UserId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->unsignedBigInteger('FK_Hardware_EstadoId')->default(1);
            $table->foreign('FK_Hardware_EstadoId')
                    ->references('PK_estado')
                    ->on('estados')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Hardware_ModelosId')->nullable();
            $table->foreign('FK_Hardware_ModelosId')
                    ->references('PK_modelo')
                    ->on('modelos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Hardware_MarcasId')->nullable();
            $table->foreign('FK_Hardware_MarcasId')
                    ->references('PK_marca')
                    ->on('marcas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('Testado_fisico_hardware'); //este se hara sin tabla 
            $table->text('Tserie_hardware');
            $table->text('Tmodelo_hardware');
            $table->text('Tdescripcion_hardware');
            $table->string('UK_Hardware_Codigo')->unique()->nullable();
            $table->date('Dadquisicion_hardware');
            $table->date('Dbaja_hardware')->nullable();
            $table->text('Tmotivo_baja_hardware')->nullable();
            $table->text('Tnumero_baja_hardware')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien');
    }
};
