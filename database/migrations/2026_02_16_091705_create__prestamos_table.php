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
        Schema::create('Prestamos', function (Blueprint $table) {
            $table->id('PK_Prestamos');

            $table->unsignedBigInteger('FK_Prestamo_HardwareId');
            $table->foreign('FK_Prestamo_HardwareId')
                    ->references('PK_Hardware')
                    ->on('hardware')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Prestamo_UserId');
            $table->foreign('FK_Prestamo_UserId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Prestamo_AreaId');
            $table->foreign('FK_Prestamo_AreaId')
                    ->references('PK_area')
                    ->on('areas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');


            $table->integer('Nnumero_prestamo');
            $table->text('Tresponsable_prestamo');
            $table->text('Tcargo_prestamo');
            $table->text('Tmotivo_prestamo');
            $table->text('Tobservaciones_prestamo')->nullable();
            $table->text('Testado_Hardware_prestamo');
            $table->text('Testado_prestamo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Prestamos');
    }
};
