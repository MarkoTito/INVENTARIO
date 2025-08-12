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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('PK_archivos');

            $table->unsignedBigInteger('FK_Archivos_SoftwareId'); //FK_B_Fisico_Ima
            $table->foreign('FK_Archivos_SoftwareId')
                    ->references('PK_Software')
                    ->on('software')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('Tpath_archivos')->unique();
            $table->string('Tnombre_archivo');
            $table->integer('Nsize_archivo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
