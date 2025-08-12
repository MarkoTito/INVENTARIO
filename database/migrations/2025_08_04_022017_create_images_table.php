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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id('PK_imagenes');

            $table->unsignedBigInteger('FK_Imagenes_HardwareId'); //FK_B_Fisico_Ima
            $table->foreign('FK_Imagenes_HardwareId')
                    ->references('PK_Hardware')
                    ->on('Hardware')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('Tpath_imagenes')->unique();
            $table->integer('Nsize_imagenes')->default(0);
            //$table->double('Tipo_Bien_Ima');  Tipo_Bien_Ima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
