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
        Schema::table('posts', function (Blueprint $table) {
          $table->string('preview_image')->nullable(); // если таблица уже существует всегда добавлять '->nullable()'
          $table->string('main_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->dropColumn('preview_image'); // при удалении двух и более полей: две и более Schema::table(...
        });
        Schema::table('posts', function (Blueprint $table) {
          $table->dropColumn('main_image'); // при удалении двух и более полей: две и более Schema::table(...
        });
    }
};
