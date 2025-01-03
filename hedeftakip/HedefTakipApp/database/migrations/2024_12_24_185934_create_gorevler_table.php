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
        Schema::create('gorevler', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->text('aciklama')->nullable();

            $table->date('baslangic_tarihi');
            $table->date('bitis_tarihi');
            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gorevler');
    }
};
