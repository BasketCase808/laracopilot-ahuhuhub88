<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->string('stripe_charge_id')->nullable();
            $table->string('customer_email');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('usd');
            $table->decimal('platform_fee', 10, 2);
            $table->decimal('merchant_payout', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};