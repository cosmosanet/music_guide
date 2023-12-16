<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('logs', function (Blueprint $table) {

            $table->increments('id');
            $table->string('changes');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('album_id')->unsigned();

            $table->index('album_id');
            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
