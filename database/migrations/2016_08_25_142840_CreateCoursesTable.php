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
            $table->string('subject')->nullable();
            $table->string('topic')->nullable();
            $table->integer('length')->nullable(); //เรียนครั้งละกี่ชม
            $table->integer('time')->nullable(); //กี่ครั้ง
            $table->string('objective')->nullable(); //เป้าหมาย
            $table->string('startdate')->nullable(); //วันเริ่ม
            $table->string('grade')->nullable();
            $table->integer('credit')->nullable(); //credit per 1 times.
            $table->string('place')->nullable();
            $table->string('group');
            $table->string('inter');
            $table->integer('verificationcode');
            $table->string('tutor_id')->nullable();
            $table->integer('user_id'); //สำหรับอ้างอิงว่าใคร
            $table->integer('class_id')->nullable();
            $table->boolean('available')->nullable();
            $table->boolean('verified')->default(false);
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
