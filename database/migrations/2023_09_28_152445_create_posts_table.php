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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('metaTitle');
            $table->string('image');
            $table->text('description');
            $table->longText('metaDescription');
            $table->string('slug');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->string('view');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_category_post');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_admin')->references('id')->on('users');
            $table->foreign('id_category_post')->references('id')->on('category_posts');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
