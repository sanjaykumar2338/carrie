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
        Schema::create('user_notification_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notification_config_id');
            $table->enum('notification_types', ['A', 'B'])->comment('Type-A 1- Email Type-B 2-Header Notification 3-Popup Notification 4-Mobile Notification');
            $table->enum('status', ['0', '1'])->default('0')->comment('0=Inactive, 1=Active');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notification_config_id')->references('id')->on('notification_configs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_notification_configs');
    }
};
