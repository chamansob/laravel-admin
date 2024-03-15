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
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();            
            $table->string('ans1', 100)->nullable();
            $table->string('ans2', 100)->nullable();
            $table->string('ans3', 100)->nullable();
            $table->string('ans4', 100)->nullable();
            $table->integer('marks')->default(1);
            $table->string('right')->nullable();
            $table->string('solution',500)->nullable();           
            $table->boolean('status')->default(0);      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answers');
    }
};
