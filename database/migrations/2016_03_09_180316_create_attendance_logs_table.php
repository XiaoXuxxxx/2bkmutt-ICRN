<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('at');
            $table->date('session_date');
            $table->string('session_key', 10);
            $table->string('camp_id', 8);
            $table->string('location', 12);
            $table->integer('checker')->unsigned()->nullable()->default(NULL);
            $table->foreign('checker')->unique()->references('id')->on('users');
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
        Schema::drop('attendance_logs');
    }
}
