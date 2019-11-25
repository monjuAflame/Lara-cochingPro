<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            
            $table->integer('coching_id');

            $table->integer('user_id')->unsigned();
            $table->integer('gurdian_id')->unsigned();
            $table->integer('school_id')->unsigned(); 
            $table->integer('address_id')->unsigned(); 
            
            $table->string('student_name',30);
            $table->string('nick_name',15);
            $table->boolean('sex');
            $table->date('dob');
            $table->string('email',100)->unique();
            $table->string('phone',15)->unique();
            $table->string('status');
            $table->date('datereg');
            $table->string('photo',200)->nullable();
            $table->boolean('s_active');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('gurdian_id')->references('gurdian_id')->on('gurdians');
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->foreign('address_id')->references('address_id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
