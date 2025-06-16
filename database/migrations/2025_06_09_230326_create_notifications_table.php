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
        Schema::create('notifications', function (Blueprint $table) {
        $table -> id();
        $table -> string('message');
        $table -> dateTime('time_date_shipping');
        $table -> string('status') -> default('in progress');
         $table -> unsignedBigInteger('notification_id');
        $table -> foreign('notification_id') -> references('id') -> on ('usuarios') -> onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
