<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangaGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga_genre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manga_id')->unsigned()->nullable();
            $table->integer('genre_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('manga_id')->references('id')->on('manga')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manga_genre');
    }
}
