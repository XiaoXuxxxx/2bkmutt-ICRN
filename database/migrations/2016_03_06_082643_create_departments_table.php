<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('camp_dept_id')->default(0);
            $table->string('faculty_abbr');
            $table->string('faculty_full_en')->nullable();
            $table->string('faculty_full_th')->nullable();
            $table->string('department_abbr');
            $table->string('department_full_en')->nullable();
            $table->string('department_full_th')->nullable();
            $table->timestamps();
        });

        //DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('departments');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
