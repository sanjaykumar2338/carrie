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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(0)->nullable();
            $table->unsignedBigInteger('object_id')->default(0)->nullable();
            $table->unsignedBigInteger('user_id')->default(0)->nullable();
            $table->string('commenter');
            $table->string('profile_url')->nullable();
            $table->string('ip');
            $table->string('email');
            $table->text('comment')->nullable();
            $table->enum('approve', ['0', '1', '2', '3'])->comment('0 => moderation / pending, 1 => approved, 2 => spam, 3 => trash');
            $table->string('browser_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
