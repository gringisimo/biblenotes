<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('date');
            $table->string('article');
            $table->integer('paragraph');
            $table->string('topic');
            $table->string('comment',100000);
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
        //
    }
}
