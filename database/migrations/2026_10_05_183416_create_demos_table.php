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
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demo_category_id')
                ->constrained('demo_categories')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('thumbnail')->nullable();
            $table->string('preview_image')->nullable();

            $table->string('demo_url')->nullable();

            $table->string('technology')->nullable();

            $table->unsignedInteger('serial_no')->default(0);

            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demos');
    }
};
