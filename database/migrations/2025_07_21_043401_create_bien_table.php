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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            //foreignId:->hace referencia al id y su tabla (tabla_suId) recuerda q la tabla tiene q ser con s
            $table->foreignId('area_id')->constrained()->onDelete('cascade')->onUpdate('cascade');


            $table->foreignId('tipo_id')->constrained()->onDelete('cascade');
            $table->text('descripcion');
            $table->string('codigo_patrimonial')->unique()->nullable();
            $table->double('estado');
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
