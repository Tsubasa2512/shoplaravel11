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
        Schema::create('gallery_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('index_menu')->default(1);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories');
            $table->integer('parent')->default(0);
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
        Schema::dropIfExists('gallery_menus');
    }
};
