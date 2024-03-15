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
        Schema::create('question_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_category_id')->constrained('question_category', 'id');
            $table->string('name', 40)->nullable();
            $table->string('image', 100)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_courses');
    }
};
