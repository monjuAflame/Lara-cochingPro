<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStutransactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stutransacts', function (Blueprint $table) {
            $table->increments('stu_transact_id');
            $table->integer('student_id')->unsigned();
            $table->integer('transact_id')->unsigned();
            $table->float('paid',8,2);
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('transact_id')->references('transact_id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stutransacts');
    }
}
