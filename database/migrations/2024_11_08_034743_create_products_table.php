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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('menu_id')->constrained('product_menus');
            $table->boolean('show')->default(true);
            $table->boolean('featured')->default(false);
            $table->text('keywords')->nullable();
            $table->text('schedule')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->foreignId('departure_from')->nullable()->constrained('locations');
            $table->foreignId('destination')->nullable()->constrained('locations');
            $table->foreignId('duration')->nullable()->constrained('durations');
            $table->string('departure_date')->nullable();
            $table->string('transportation')->nullable();
            $table->string('attractions')->nullable();
            $table->foreignId('tour_type')->nullable()->constrained('tour_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
