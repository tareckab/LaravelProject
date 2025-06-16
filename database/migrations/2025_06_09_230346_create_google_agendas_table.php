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
        Schema::create('google_agenda', function (Blueprint $table) {
        $table -> id();
        $table -> string('titulo');
        $table -> date('event_date');
        $table -> time('event_time');
        $table -> string('event_description');
        $table -> integer('google_event_id');
        $table -> unsignedBigInteger('account_id');
        $table -> foreign('account_id') -> references('id') -> on ('bills') -> onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_agendas');
    }
};
