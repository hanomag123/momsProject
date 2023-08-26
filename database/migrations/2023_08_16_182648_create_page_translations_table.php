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
    Schema::create('page_translations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('page_id')->constrained()->onDelete('cascade');
      $table->foreignId('locale_id')->nullable()->constrained()->onDelete('cascade');
      $table->string('title')->nullable();
      $table->text('description')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('page_translations');
  }
};
