<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fazendas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('proprietario');
            $table->string('zona');
            $table->string('cidade');
            $table->string('cep');
            $table->integer('delete')->nullable()->default(null);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('fazendas');
    }
};
