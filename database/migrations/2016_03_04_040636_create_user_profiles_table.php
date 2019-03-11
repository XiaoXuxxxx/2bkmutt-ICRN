<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('user_id')->unique()->references('id')->on('users');
            $table->string('camp_id', 8)->nullable();
            $table->string('rfid', 10)->nullable();
            $table->string('qrcode', 64)->nullable();
            $table->string('qrcodeimg')->nullable();
            $table->integer('dept_id');
            $table->integer('sec')->nullable();
            $table->string('grade', 20)->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('title', 10)->nullable();
            $table->string('first_name-en', 32);
            $table->string('last_name-en', 32);
            $table->string('nickname-en', 32);
            $table->string('first_name-th', 32);
            $table->string('last_name-th', 32);
            $table->string('nickname-th', 32);
            $table->string('parent_first_name-th', 32)->nullable();
            $table->string('parent_last_name-th', 32)->nullable();
            $table->string('school', 256);
            $table->string('email', 64)->nullable();
            $table->string('facebook', 64)->nullable();
            $table->date('birth_date');
            $table->string('self_telephone_no', 20);
            $table->string('parent_telephone_no', 20);
            $table->string('disease', 256)->nullable();
            $table->string('allergic', 256)->nullable();
            $table->string('religion', 64);
            $table->string('image_filename')->nullable();
            $table->string('remark', 1000)->nullable();
            $table->integer('is_dorm')->default(0);
            $table->string('dorm_info', 64)->nullable();
            $table->string('checkWhere', 64)->nullable();
            $table->string('whenCome', 64)->nullable();
            $table->string('whereOther', 64)->nullable();
            $table->string('whenOut', 64)->nullable();
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
        Schema::drop('user_profiles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
