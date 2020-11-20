<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->text('cover');
            $table->text('name');
            $table->text('genre');
            $table->integer('year');
            $table->text('director');
            $table->float('IMDB',2,2);
            $table->float('Kinopoisk',2,2);
            $table->integer('budget');
            $table->integer('fees');
            $table->text('actors');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
