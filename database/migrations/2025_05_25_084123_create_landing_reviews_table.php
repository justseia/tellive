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
        Schema::create('landing_reviews', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->integer('index');
            $table->string('name_review');
            $table->string('title');
            $table->string('text_review');
            $table->string('countries');
            $table->string('image_url');
            $table->date('date');
            $table->foreignUuid('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_reviews');
    }
};
