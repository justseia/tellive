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
        Schema::create('landing_banners', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->integer('index');
            $table->string('name_banner');
            $table->string('title');
            $table->string('text_banner');
            $table->string('image_url');
            $table->string('text_button');
            $table->string('url_button');
            $table->foreignUuid('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_banners');
    }
};
