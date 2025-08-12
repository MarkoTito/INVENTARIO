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
        Schema::create('determinaciones', function (Blueprint $table) {
            $table->id('PK_determinacion');
            $table->text('Tdescripcion_determinacion')->unique();
            $table->integer('Testado_determinacion')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('determinaciones');
    }
};
