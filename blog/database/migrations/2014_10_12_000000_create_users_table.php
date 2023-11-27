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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string("user_roll")->default("user");

            $table->string("profile_pic")->default("originalprofile.jpg");
            $table->string("bio")->nullable();
            $table->string("date_of_birth")->nullable();
            $table->string("education")->nullable();
            $table->string("work")->nullable();
            $table->string("live")->nullable();
            // $table->string("post_id")->default(0);
            // $table->string("report_id")->default(0);

            $table->integer("email_action")->default(1);
            $table->integer("ban")->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
