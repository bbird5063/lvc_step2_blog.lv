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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // добавили
            $table->text('content'); // добавили
						$table->unsignedBigInteger('category_id')->nullable(); // добавили
            $table->timestamps();

						$table->index('category_id', 'post_category_idx'); // название: <табл.в одиноч.числе>_<табл.в одиноч.числе к которой привязываемся>_idx
						$table->foreign('category_id', 'post_category_fk')->on('categories')->references('id'); // ...->on('categories') имя табл.(множ.число)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
