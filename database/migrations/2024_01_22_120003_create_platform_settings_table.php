<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('platform_settings', function (Blueprint $table) {
            $table->id();
            $table->string('platform_name')->default('Stripe Connect Platform');
            $table->decimal('platform_fee_percentage', 5, 2)->default(2.50);
            $table->enum('stripe_mode', ['test', 'live'])->default('test');
            $table->boolean('auto_approve_merchants')->default(false);
            $table->boolean('require_verification')->default(true);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('platform_settings');
    }
};