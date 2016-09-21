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
            $table->integer('length')->nullable(); //เรียนครั้งละกี่ชม
            $table->integer('time')->nullable(); //กี่ครั้ง
            $table->integer('credit')->nullable(); //credit per 1 times.
            $table->string('subject')->nullable();
            $table->string('objective')->nullable(); //เป้าหมาย
            $table->string('startdate')->nullable(); //วันเริ่ม
            $table->string('grade')->nullable();
            $table->string('topic')->nullable();
            $table->string('tutor')->nullable();
            $table->string('place')->nullable();
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
