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
        Schema::create('iletisim_sayfası',
            function (Blueprint $table) {
                $table->id();
                $table->string('ad');
                $table->string('soyad');
                $table->string('email');
                $table->text('mesaj');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iletisim_sayfası');
    }
};
