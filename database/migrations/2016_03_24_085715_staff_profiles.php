<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('staff_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dept_id');
            $table->integer('sec')->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('title', 10)->nullable();
            $table->string('first_name_th', 32);
            $table->string('last_name_th', 32);
            $table->string('nickname_th', 32);
            $table->string('first_name_en', 32);
            $table->string('last_name_en', 32);
            $table->string('nickname_en', 32);
            $table->string('email', 64)->nullable();
            $table->string('facebook', 64)->nullable();
            $table->date('birth_date');
            $table->string('telephone_no', 20);
            $table->string('disease', 500)->nullable();
            $table->string('allergic', 500)->nullable();
            $table->string('image_filename')->nullable();
            $table->string('remark', 1000)->nullable();
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
        Schema::drop('staff_profiles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
