<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pic',400)->collation('utf8_unicode_ci');
            $table->string('title',400)->collation('utf8_unicode_ci');
            $table->string('abstract',1000)->collation('utf8_unicode_ci');
            $table->text('body')->collation('utf8_unicode_ci');

            //$table->dateTime('createdtime');
            //$table->dateTime('editedtime');

            $table->tinyInteger('published')->default(0);

            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
