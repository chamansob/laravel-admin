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
        Schema::create('serieses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40)->nullable();
            $table->integer('price')->nullable();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('author', 20)->nullable();
            $table->string('text', 300)->nullable();
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
        Schema::dropIfExists('serieses');
    }
};
