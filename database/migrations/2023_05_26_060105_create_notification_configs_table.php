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
        Schema::create('notification_configs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('code', 255);
            $table->string('table_model', 255);
            $table->string('notification_types', 50)->comment('Type-A 1- Email Type-B 2-Header Notification 3-Popup Notification 4-Mobile Notification');
            $table->longText('placeholders')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_configs');
    }
};
