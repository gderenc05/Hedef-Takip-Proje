<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateKullanicilarTable extends Migration
{
    public function up()
    {
        Schema::create('kullanicilar', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->string('email')->unique();
            $table->string('parola');
            $table->enum('durum', ['aktif', 'pasif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kullanicilar');
    }
}
