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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
<<<<<<< HEAD
            $table->string('site_title');            
            $table->string('app_name')->nullable();  
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('company_address',50)->nullable();
            $table->string('email')->nullable();                      
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('google')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('style')->nullable();             
=======
            $table->string('site_title',50);
            $table->string('app_name', 50)->nullable();  
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('company_address', 100)->nullable();            
            $table->string('email',40)->nullable();                      
            $table->string('facebook',30)->nullable();
            $table->string('twitter',30)->nullable();
            $table->string('pinterest',30)->nullable();
            $table->string('google',30)->nullable();
            $table->string('vimeo',30)->nullable();
            $table->integer('style')->default(1);             
>>>>>>> 0b7ded6902ce23d2f257045bb3d1614a5d6a5d31
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
