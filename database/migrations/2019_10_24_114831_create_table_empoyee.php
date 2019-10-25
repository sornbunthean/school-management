<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmpoyee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empoyee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('first_name', 100);
            $table->string('last_name',100);
            $table->string('gender',1);
            $table->date('dob');
            $table->string('email', 100)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('address', 200)->nullable();
            $table->tinyInteger('active')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
