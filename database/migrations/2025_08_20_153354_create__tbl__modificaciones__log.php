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
        Schema::create('tbl_modificaciones_log', function (Blueprint $table) {
            $table->id('PK_modificaciones');

            $table->unsignedBigInteger('FK_Modificaciones_UserId');
            $table->foreign('FK_Modificaciones_UserId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Modificaciones_HardwareId')->nullable();
            $table->foreign('FK_Modificaciones_HardwareId')
                    ->references('PK_Hardware')
                    ->on('Hardware')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Modificaciones_SoftwareId')->nullable();
            $table->foreign('FK_Modificaciones_SoftwareId')
                    ->references('PK_Software')
                    ->on('software')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('Tdescripcion_modificaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_tbl__modificaciones__log');
    }
};
