<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks');
        });

        Schema::table('banks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['bank_id']);
        });

        Schema::table('banks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};
