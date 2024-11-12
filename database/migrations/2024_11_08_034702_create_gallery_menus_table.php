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
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('name_vi'); // Tên menu gallery tiếng Việt
            $table->string('name_en'); // Tên menu gallery tiếng Anh
            $table->foreignId('category_id')->constrained('categories');

            $table->string('slug')->unique();
            $table->boolean('show')->default(true);  // Trường hiển thị, mặc định là true (hiển thị)
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
