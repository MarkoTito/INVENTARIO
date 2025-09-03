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
        Schema::create('bajas', function (Blueprint $table) {
            $table->id('PK_Bajas');
            
            $table->unsignedBigInteger('FK_Bajas_HardwareId');
            $table->foreign('FK_Bajas_HardwareId')
                    ->references('PK_Hardware')
                    ->on('Hardware')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('FK_Baja_UserId');
            $table->foreign('FK_Baja_UserId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            //id del usuarioio que lo cancelo
             $table->unsignedBigInteger('FK_null_Baja_UserId')->nullable();
            $table->foreign('FK_null_Baja_UserId')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->text('Tdescripcion_baja');
            //rebercion
            $table->text('Tdescripcion_null_baja')->nullable();
            
            $table->text('Testado_baja')->default(1);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_bajas');
    }
};
