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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_model_id')->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->constrained()->onDelete('cascade');
            $table->string('slug')->index();
            $table->string('title');
            $table->string('title_tm')->nullable();
            $table->string('title_ru')->nullable();
            $table->text('description')->nullable();
            $table->text('description_tm')->nullable();
            $table->text('description_ru')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('is_stock')->default(0);
            $table->boolean('is_discount')->default(0);
            $table->integer('discount_precent')->default(0);
            $table->dateTime('discount_expires_in')->nullable();
            $table->integer('viewed', 0, 1)->nullable();
            $table->float('rating')->nullable();
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
