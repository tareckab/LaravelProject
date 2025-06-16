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
       Schema::create('banks', function (Blueprint $table) {
    $table->id();
    $table->string('name_bank');
    $table->integer('agency');
    $table->string('account_number');
    $table->string('account_type');
    $table->unsignedBigInteger('user_id'); // ainda sem foreign
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
