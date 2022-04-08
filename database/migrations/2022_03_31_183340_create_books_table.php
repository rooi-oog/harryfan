<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('heading_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('series_id')->nullable();
            $table->integer('series_vol')->nullable();
            $table->text('title')->nullable();
            $table->text('isbn')->nullable();
            $table->binary('cover')->nullable();
            $table->integer('file_id')->index()->unique();
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('subgenre_id')->references('id')->on('subgenres');
            $table->foreign('series_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
