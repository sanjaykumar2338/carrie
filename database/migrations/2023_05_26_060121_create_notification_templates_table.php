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
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_config_id');
            $table->tinyInteger('notification_type_id');
            $table->string('slug', 255)->nullable();
            $table->text('subject')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->foreign('notification_config_id')->references('id')->on('notification_configs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_templates');
    }
};
