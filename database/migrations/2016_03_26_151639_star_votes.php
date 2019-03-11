<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StarVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('star_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('user_id')->unique()->references('id')->on('users');
            $table->integer('vote_m_profile_id')->unsigned()->nullable()->default(NULL);
            $table->integer('vote_f_profile_id')->unsigned()->nullable()->default(NULL);
            $table->integer('vote_s_profile_id')->unsigned()->nullable()->default(NULL);
            $table->integer('vote_mf_profile_id')->unsigned()->nullable()->default(NULL);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('star_votes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
