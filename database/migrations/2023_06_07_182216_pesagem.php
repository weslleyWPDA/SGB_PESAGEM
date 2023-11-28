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
        Schema::create('pesagem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fornecedor_id')->nullable()->constrained('fornecedores');
            $table->foreignId('produto_id')->nullable()->constrained('produtos');
            $table->string('nf');
            $table->string('motorista');
            $table->string('placa');
            $table->date('data_entrad');
            $table->integer('peso_entrad');
            $table->date('data_saida')->nullable();
            $table->integer('peso_saida')->nullable();
            $table->string('obs')->nullable();
            $table->foreignId('fazenda_id')->nullable()->constrained('fazendas');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->integer('delete')->nullable()->default(null);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pesagem');
    }
};
