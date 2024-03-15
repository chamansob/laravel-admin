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
        Schema::create('serieses_topics', function (Blueprint $table) {
            $table->id();
            $table->integer('seriese_id');
            $table->string('name', 40)->nullable();
            $table->integer('timer')->nullable();
            $table->integer('marks')->nullable();
            $table->integer('neg_mark')->nullable();
            $table->date('start')->nullable();
            $table->date('solve_date')->nullable();
            $table->boolean('rand')->default(0);
            $table->boolean('calculator')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serieses_topics');
    }
};
