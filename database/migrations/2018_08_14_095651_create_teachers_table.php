<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pic', 400)->collation('utf8_unicode_ci');
            $table->string('name', 400)->collation('utf8_unicode_ci');
            $table->string('title', 400)->collation('utf8_unicode_ci');
            $table->string('abstract', 4000)->collation('utf8_unicode_ci');
            $table->text('description')->collation('utf8_unicode_ci');

            $table->unsignedInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');

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
        Schema::dropIfExists('teachers');
    }
}
