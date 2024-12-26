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
        Schema::create('hedefler', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->unsignedBigInteger('kategori_id')->nullable(); // Kategori ilişkisi
            $table->text('aciklama')->nullable();
            $table->date('baslangic_tarihi');
            $table->date('bitis_tarihi');

            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoriler')->onDelete('cascade');
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hedefler');
    }
};
