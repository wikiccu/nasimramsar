<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name', 400);
            $table->string('email', 400);
            $table->string('body', 4000);
            $table->string('ip', 100);
            $table->dateTime('postdate');
            
            $table->tinyInteger('readed',4);
            $table->tinyInteger('removed',4);
            
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
        Schema::dropIfExists('messages');
    }
}
