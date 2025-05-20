<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name')->nullable();
            $table->string('type')->nullable();
            $table->string('tariff')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('curator')->nullable();
            $table->string('city')->nullable();
            $table->date('last_payment_date')->nullable();
            $table->date('last_payment_partnership')->nullable();
            $table->text('note')->nullable();
            $table->foreignUuid('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
