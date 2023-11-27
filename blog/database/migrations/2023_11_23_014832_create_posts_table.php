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
            $table->text("title");
            $table->text("images")->nullable();
            $table->integer("category_id");
            $table->text("description");
            $table->integer("user_id");
            $table->string("post_action")->default("waiting");
            $table->string("comments_action")->default("on");
            $table->string("print_action")->default("on");
            $table->string("rreason_id")->nullable();
            $table->string("report")->default("none");
            $table->timestamps();
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
