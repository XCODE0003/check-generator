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
        Schema::create('payment_checks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('document_number');
            $table->string('bank_name');
            $table->string('card_number');
            $table->string('receiver_name');
            $table->string('amount_hint')->nullable();
            $table->string('amount_display');
            $table->string('status_label')->default('Тўловга тайёр');
            $table->string('receipt_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_checks');
    }
};
