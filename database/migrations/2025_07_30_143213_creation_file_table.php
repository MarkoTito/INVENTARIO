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
        //
        Schema::create('file', function (Blueprint $table) {
            $table->id('PK_file');
            /*
            $table->unsignedBigInteger('FK_B_Digital_File');
            $table->foreign('FK_B_Digital_File')
                    ->references('PK_B_Digital')
                    ->on('b_digital')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            */
            $table->double('FK_B_Digital_File');

            $table->string('T_Nombre_File');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
