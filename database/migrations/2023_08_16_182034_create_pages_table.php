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
      Schema::create('pages', function (Blueprint $table) {
        $table->id();
        $table->string('slug', 250)->nullable();
        $table->string('title', 250)->nullable();
        $table->string('image', 250)->nullable();
        $table->string('meta_title', 150)->nullable();
        $table->string('meta_description', 300)->nullable();
        $table->string('meta_keywords', 300)->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
