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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text', 'audio','image','video','file']);
            $table->string('body')->nullable();
            $table->dateTime('expires_at')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // message belongs to a thread
            $table->foreignId('thread_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
