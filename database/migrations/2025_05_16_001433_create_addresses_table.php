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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();               // Ex: "Casa", "Trabalho"
            $table->string('recipient_name')->nullable();    // Nome de quem vai receber
            $table->string('cep', 9);
            $table->string('street');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('district');
            $table->string('city');
            $table->string('state', 2);          // Ex: SP, RJ, etc.
            $table->decimal('freight', 10, 2)->default(0); // valor do frete pra esse endereço (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
