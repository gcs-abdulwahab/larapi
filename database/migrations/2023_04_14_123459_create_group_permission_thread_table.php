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
        Schema::create('group_permission_thread', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('thread_id')->constrained('threads')->onDelete('cascade');

            // create Permission enum
            $table->enum('permission', ['read', 'write', 'both', 'none'])->default('both');
            
            // make two of them unique
            $table->unique(['group_id', 'thread_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_permission_tag_table');
    }
};
