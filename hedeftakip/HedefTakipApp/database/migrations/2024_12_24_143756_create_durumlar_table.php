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
        Schema::create('durumlar', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->timestamps();
        });

        Schema::table('hedefler', function (Blueprint $table) {
            $table->unsignedBigInteger('durum_id')->nullable(); // Durumlar tablosuna ilişki
            $table->foreign('durum_id')->references('id')->on('durumlar')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hedefler', function (Blueprint $table) {
            $table->dropForeign(['durum_id']);
            $table->dropColumn('durum_id');
        });

        Schema::dropIfExists('durumlar');
    }
};
