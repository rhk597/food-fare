<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('srno');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('company');
            $table->string('city');
            $table->string('state');
            $table->Integer('security_status');
            $table->text('sec_answer');
            $table->bigInteger('sec_id')->unsigned();
            $table->foreign('sec_id')
            ->references('srno')->on('security_questions');
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
        Schema::dropIfExists('users');
    }
}
