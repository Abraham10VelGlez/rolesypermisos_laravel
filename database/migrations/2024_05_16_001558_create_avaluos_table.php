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
        Schema::create('avaluos', function (Blueprint $table) {
            $table->id();
            $table->string('namecontribuyente');
            $table->integer('anioval');
            $table->integer('ingresoidfk');
            $table->integer('tipopredio');
            $table->integer('iduserfk');
            $table->timestamps();         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaluos');
    }
};
