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
        Schema::create('kategoriler', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->text('aciklama')->nullable();
            $table->timestamps(); // created_at ve updated_at otomatik eklenir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoriler');
    }
};
