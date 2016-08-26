<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //สำหรับอ้างอิงว่าใคร
            $table->integer('class_id')->nullable();
            $table->integer('time')->nullable();
            $table->integer('credit')->nullable();
            $table->string('subject')->nullable();
            $table->string('tutor')->nullable();
            $table->boolean('available')->nullable();
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
        Schema::drop('courses');
    }
}
