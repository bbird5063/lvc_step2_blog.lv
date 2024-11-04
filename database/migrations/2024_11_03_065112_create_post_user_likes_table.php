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
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
						$table->unsignedBigInteger('post_id'); // добавили
						$table->unsignedBigInteger('user_id'); // добавили
            $table->timestamps();
						
						// IDX (pul - сохращенно от 'post_user_likes')
						$table->index('post_id', 'pul_post_idx'); // название: <табл.в одиноч.числе>_<табл.в одиноч.числе к которой привязываемся>_idx
						$table->index('user_id', 'pul_user_idx'); // название: <табл.в одиноч.числе>_<табл.в одиноч.числе к которой привязываемся>_idx
						
						// FK
						$table->foreign('post_id', 'pul_post_fk')->on('posts')->references('id'); // ...->on('posts') имя табл.(множ.число)
						$table->foreign('user_id', 'pul_user_fk')->on('users')->references('id'); // ...->on('users') имя табл.(множ.число)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_user_likes');
    }
};
