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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('cover_id')->nullable();
            $table->foreign('cover_id')->references('id')->on('uploads')->onDelete('set null');
            $table->enum('status', ['published', 'unpublished', 'scheduled'])->default('published');
            $table->string('publishingDate')->default('none');
            $table->foreignId('parent_id')->constrained('categories')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('meta_tag_title')->nullable();
            $table->text('meta_tag_description')->nullable();
            $table->string('meta_tag_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};