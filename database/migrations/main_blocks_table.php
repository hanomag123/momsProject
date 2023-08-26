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
      $table->unsignedBigInteger('ref_id')->nullable();
      $table->foreignId('locale_id')->default(1)->constrained()->onDelete('cascade');
      $table->foreignId('image_id')->default(1)->constrained();
    });
    
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('main_blocks');
  }
};
