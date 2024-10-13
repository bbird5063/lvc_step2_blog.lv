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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
						$table->unsignedBigInteger('post_id'); // добавили
						$table->unsignedBigInteger('tag_id'); // добавили
            $table->timestamps();
						
						// IDX
						$table->index('post_id', 'post_tag_post_idx'); // название: <табл.в одиноч.числе>_<табл.в одиноч.числе к которой привязываемся>_idx
						$table->index('tag_id', 'post_tag_tag_idx'); // название: <табл.в одиноч.числе>_<табл.в одиноч.числе к которой привязываемся>_idx
						
						// FK
						$table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id'); // ...->on('posts') имя табл.(множ.число)
						$table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id'); // ...->on('tags') имя табл.(множ.число)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
