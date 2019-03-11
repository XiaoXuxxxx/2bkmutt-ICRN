<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('user_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('profile_id')->unique()->references('id')->on('user_profiles');
            $table->string('project_th', 128)->nullable();
            $table->string('project_en', 128);
            $table->string('professor_th', 256)->nullable();
            $table->string('professor_en', 256);
            $table->string('pdf_filename')->nullable();
            $table->string('present_filename')->nullable();
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
        Schema::drop('user_projects');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
