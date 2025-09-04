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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('PK_Comentario');

            $table->unsignedBigInteger('FK_Comentario_HardwareId');
            $table->foreign('FK_Comentario_HardwareId')
                    ->references('PK_Hardware')
                    ->on('Hardware')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Comentario_UserId');
            $table->foreign('FK_Comentario_UserId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('Tdescripcion_comentario');

            $table->text('Tobservacion_comentario')->nullable();
            $table->text('Trecomendacion_comentario')->nullable();
            
            $table->integer('Nnumero_comentario')->nullable();
            $table->integer('Tubicacion_comentario')->nullable();//este no deberia ser null (es prueba)

            $table->text('Testado_fisico_comentario');


            $table->text('Testado_comentario')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario');
    }
};
