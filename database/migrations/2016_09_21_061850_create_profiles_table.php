<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('calledname');
            $table->integer('birthdate');
            $table->string('gender');
            $table->string('school')->nullable();
            $table->string('university')->nullable();
            $table->string('field');
            $table->string('inter');
            $table->string('email');
            $table->text('bio')->nullable();
            $table->string('phone');
            $table->string('lineid')->nullable();
            $table->string('status'); //whether user is parent tutor or student or whatever.
            $table->integer('teachhours')->nullable();
            $table->string('tutorgrade')->nullable();
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
        Schema::drop('profiles');
    }
}
