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
        Schema::create('main_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 40)->nullable();
            $table->string('intro', 700)->nullable();
            $table->foreignId('language_id')->default(1)->constrained();
            $table->string('img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mane_blocks');
    }
};
