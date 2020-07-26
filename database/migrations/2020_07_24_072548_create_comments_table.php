<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('parent_id');
            $table->string('userName');
            $table->string('commentStory');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
