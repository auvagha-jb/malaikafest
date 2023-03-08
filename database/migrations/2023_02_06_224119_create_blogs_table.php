<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blogID');
            $table->string('blogTitle');
            $table->unsignedBigInteger('blogCategory');
            $table->foreign('blogCategory')->references('blogCategoryID')->on('blog_categories');//->onDelete('cascade');
            $table->text('blogQuote'); //Restrict no.of characters in backend
            $table->text('blogText');
            $table->string('blogImg');
            $table->integer('importance')->default('5');
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
        Schema::dropIfExists('blogs');
    }
}
