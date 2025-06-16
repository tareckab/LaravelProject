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
        Schema::create('bills', function (Blueprint $table) {
        $table -> id();
        $table -> string('description');
        $table -> decimal('value');
        $table -> date('maturity_date');
        $table -> string('status');
        $table -> boolean ('notification_generated');
         $table -> unsignedBigInteger('bank_id');
        $table -> foreign('bank_id') -> references('id') -> on ('banks') -> onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
