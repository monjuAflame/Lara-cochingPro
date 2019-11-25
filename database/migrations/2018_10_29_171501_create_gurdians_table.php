<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurdiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurdians', function (Blueprint $table) {
            $table->increments('gurdian_id');
            $table->string('father_name',30);
            $table->string('mother_name',30);
            $table->string('gurdian_name',30);
            $table->string('gurdian_phone',15)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurdians');
    }
}
