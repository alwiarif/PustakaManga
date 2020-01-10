<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manga_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('slug');
            $table->double('view',8,0)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('manga_id')->references('id')->on('manga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter');
    }
}
