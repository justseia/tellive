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
        Schema::create('history_blocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('text');
            $table->string('images_url');
            $table->string('youtube_url');
            $table->foreignUuid('history_id')->constrained('histories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_blocks');
    }
};
