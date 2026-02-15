<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_id')->unique();
            $table->string('business_name');
            $table->string('business_email')->unique();
            $table->string('business_phone');
            $table->string('business_url');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country', 2);
            $table->enum('business_type', ['individual', 'company', 'non_profit']);
            $table->string('industry');
            $table->enum('status', ['pending', 'active', 'suspended', 'inactive'])->default('pending');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
};