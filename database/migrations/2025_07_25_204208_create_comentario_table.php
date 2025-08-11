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
        Schema::create('comentario', function (Blueprint $table) {
            $table->id('PK_Comentario');

            $table->unsignedBigInteger('FK_Comentario_FisicoId');
            $table->foreign('FK_Comentario_FisicoId')
                    ->references('PK_B_Fisico')
                    ->on('Hardware')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('T_User_Name');
            $table->text('T_Descripcion_Comentario');
            $table->text('T_Estado')->nullable();

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
