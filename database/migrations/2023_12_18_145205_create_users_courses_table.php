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
        Schema::create('users_courses', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger("user_id");
            $table->unSignedBigInteger("course_id");
            $table->foreign("user_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->foreign("course_id")->references("course_id")->on("courses")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_courses');
    }
};
