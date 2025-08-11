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
        Schema::create('B_fisicos', function (Blueprint $table) {
            $table->id('PK_B_Fisico');
            //foreignId:->hace referencia al id y su tabla (tabla_suId) recuerda q la tabla tiene q ser con s
            //$table->foreignId('area_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('FK_B_Fisico_Area');
            $table->foreign('FK_B_Fisico_Area')
                    ->references('PK_area')
                    ->on('areas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            
            $table->unsignedBigInteger('FK_B_Fisico_TipoId');
            $table->foreign('FK_B_Fisico_TipoId')
                    ->references('PK_Tipo')
                    ->on('tipos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('T_B_Descripcion');
            $table->string('UK_Codigo_Pratimonial')->unique()->nullable();
            $table->date('D_Adquisicion');
            $table->text('T_Estado_Fisico');
            $table->string('T_Estado')->default('Activo'); //se puede mejorar con una tabla (esto es para ver si esta activo o de baja)
            $table->date('D_Baja')->nullable();
            $table->text('B_User_Name_Baja')->nullable();
            $table->text('T_Motivo_Baja')->nullable();
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
