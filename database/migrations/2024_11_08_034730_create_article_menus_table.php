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
        Schema::create('article_menus', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('name_vi');
            $table->string('name_en');
            $table->foreignId('category_id')->constrained('categories');
            $table->integer('index_menu')->default(1);
            $table->string('slug')->unique();
            $table->boolean('show')->default(true);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_menus');
    }
};
