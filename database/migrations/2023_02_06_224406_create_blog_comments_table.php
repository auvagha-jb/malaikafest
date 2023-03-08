<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id('blogCommentID');
            $table->string('username');
            $table->string('emailAddress')->unique();
            $table->text('comment');
            $table->unsignedBigInteger('blogID');
            $table->foreign('blogID')->references('blogID')->on('blogs');//->onDelete('cascade');
            $table->timestamps();
            $table->boolean('isDeleted')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comments');
    }
}
