<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stripe_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained()->onDelete('cascade');
            $table->string('stripe_account_id')->unique();
            $table->string('publishable_key');
            $table->string('secret_key');
            $table->enum('account_type', ['standard', 'express', 'custom'])->default('standard');
            $table->enum('status', ['active', 'pending', 'revoked'])->default('pending');
            $table->json('capabilities')->nullable();
            $table->boolean('charges_enabled')->default(false);
            $table->boolean('payouts_enabled')->default(false);
            $table->json('verification_status')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('revoked_at')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('stripe_accounts');
    }
};