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
        Schema::create('seo_landing_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('eyebrow')->nullable();

            $table->string('hero_title');
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('primary_cta')->nullable();
            $table->string('primary_cta_url')->nullable();

            $table->string('secondary_cta')->nullable();
            $table->string('secondary_cta_url')->nullable();

            $table->json('problem')->nullable();
            $table->json('solution')->nullable();
            $table->json('capabilities')->nullable();
            $table->json('process')->nullable();
            $table->json('technologies')->nullable();
            $table->json('benefits')->nullable();
            $table->json('faqs')->nullable();
            $table->json('related_pages')->nullable();

            $table->boolean('status')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_landing_pages');
    }
};
