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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();

            $table->text('description')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('image')->nullable();
            $table->string('alt_text')->nullable();

            $table->longText('overview')->nullable();
            $table->longText('seo_content')->nullable();

            $table->json('metrics')->nullable();
            $table->json('features')->nullable();
            $table->json('technologies')->nullable();
            $table->json('benefits')->nullable();

            $table->string('cta_title')->nullable();
            $table->text('cta_text')->nullable();
            $table->string('cta_button')->nullable();

            $table->longText('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);

            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
