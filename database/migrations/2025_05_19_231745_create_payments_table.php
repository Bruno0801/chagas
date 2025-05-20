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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            $table->enum('method', ['pix', 'credit_card', 'boleto']);
            $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->decimal('amount', 10, 2);

            $table->string('link')->nullable();     // link de pagamento (se aplicável)
            $table->string('url')->nullable();      // pode ser usado pra QR Code, boleto, etc.

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
