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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->string('state', 200);
            $table->text('address');
            $table->string('city', 200);
            $table->string('zip_code', 20);
            $table->string('phone', 30);
            $table->string('email', 200);
            $table->string('price', 20);
            $table->unsignedBigInteger('user_id');
            $table->string('status', 200)->default('Processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
